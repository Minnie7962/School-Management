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

class StudentController extends Controller
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

    public function storeStudent(StudentStoreRequest $request)
    {
        try {
            $this->userRepository->createStudent($request->validated());
            return back()->with('status', 'Student created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating student: ' . $e->getMessage());
            return back()->withError('Failed to create student.');
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

    public function createStudent()
    {
        $current_school_session_id = $this->getSchoolCurrentSession();
        $school_classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);
        return view('students.add', compact('current_school_session_id', 'school_classes'));
    }

    public function editStudent($student_id)
    {
        try {
            $student = $this->userRepository->findStudent($student_id);
            $parent_info = $this->studentParentInfoRepository->getParentInfo($student_id);
            $promotion_info = $this->promotionRepository->getPromotionInfoById($this->getSchoolCurrentSession(), $student_id);

            return view('students.edit', compact('student', 'parent_info', 'promotion_info'));
        } catch (\Exception $e) {
            Log::error('Error editing student: ' . $e->getMessage());
            return back()->withError('Failed to retrieve student details.');
        }
    }

    public function updateStudent(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        try {
            $this->userRepository->updateStudent($validated);
            return back()->with('status', 'Student updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating student: ' . $e->getMessage());
            return back()->withError('Failed to update student.');
        }
    }
}

