<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use App\Interfaces\SectionInterface;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Repositories\PromotionRepository;
use App\Repositories\StudentParentInfoRepository;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\TeacherStoreRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;

class TeacherController extends Controller
{
    use SchoolSession;

    protected $userRepository;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $schoolSectionRepository;
    protected $promotionRepository;
    protected $studentParentInfoRepository;

    public function __construct(
        UserInterface $userRepository,
        SchoolSessionInterface $schoolSessionRepository,
        SchoolClassInterface $schoolClassRepository,
        SectionInterface $schoolSectionRepository,
        PromotionRepository $promotionRepository,
        StudentParentInfoRepository $studentParentInfoRepository
    ) {
        $this->middleware(['can:view users']);
        $this->userRepository = $userRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
        $this->schoolSectionRepository = $schoolSectionRepository;
        $this->promotionRepository = $promotionRepository;
        $this->studentParentInfoRepository = $studentParentInfoRepository;
    }

    public function storeTeacher(TeacherStoreRequest $request)
    {
        try {
            $this->userRepository->createTeacher($request->validated());
            return back()->with('status', 'Teacher created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating teacher: ' . $e->getMessage());
            return back()->withError('Failed to create teacher.');
        }
    }
    public function getStudentList(Request $request)
    {
        $current_school_session_id = $this->getSchoolCurrentSession();
        $class_id = $request->query('class_id', 0);
        $section_id = $request->query('section_id', 0);

        try {
            $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);
            $studentList = $this->userRepository->getAllStudents($current_school_session_id, $class_id, $section_id)
                ->paginate(10); // ✅ Added pagination

            return view('students.list', compact('studentList', 'school_classes'));
        } catch (\Exception $e) {
            Log::error('Error fetching student list: ' . $e->getMessage());
            return back()->withError('Failed to retrieve student list.');
        }
    }

    public function showStudentProfile($id)
    {
        try {
            $student = $this->userRepository->findStudent($id);
            $current_school_session_id = $this->getSchoolCurrentSession();
            $promotion_info = $this->promotionRepository->getPromotionInfoById($current_school_session_id, $id);

            return view('students.profile', compact('student', 'promotion_info'));
        } catch (\Exception $e) {
            Log::error('Error fetching student profile: ' . $e->getMessage());
            return back()->withError('Failed to retrieve student profile.');
        }
    }

    public function showTeacherProfile($id)
    {
        try {
            $teacher = $this->userRepository->findTeacher($id);
            return view('teachers.profile', compact('teacher'));
        } catch (\Exception $e) {
            Log::error('Error fetching teacher profile: ' . $e->getMessage());
            return back()->withError('Failed to retrieve teacher profile.');
        }
    }

    public function editTeacher($teacher_id)
    {
        try {
            $teacher = $this->userRepository->findTeacher($teacher_id);
            return view('teachers.edit', compact('teacher'));
        } catch (\Exception $e) {
            Log::error('Error editing teacher: ' . $e->getMessage());
            return back()->withError('Failed to retrieve teacher details.');
        }
    }

    public function updateTeacher(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        try {
            $this->userRepository->updateTeacher($validated);
            return back()->with('status', 'Teacher updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating teacher: ' . $e->getMessage());
            return back()->withError('Failed to update teacher.');
        }
    }

    public function getTeacherList()
    {
        $teachers = $this->userRepository->getAllTeachers()->paginate(10); // ✅ Added pagination
        return view('teachers.list', compact('teachers'));
    }
}
