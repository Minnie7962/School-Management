<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use App\Repositories\NoticeRepository;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Repositories\PromotionRepository;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    use SchoolSession;
    
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $userRepository;
    
    public function __construct(
        UserInterface $userRepository, 
        SchoolSessionInterface $schoolSessionRepository, 
        SchoolClassInterface $schoolClassRepository
    ) {
        // $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
    }

    public function index()
    {
        try {
            $current_school_session_id = $this->getSchoolCurrentSession();
            
            // Fetch classes safely
            $classes = $this->schoolClassRepository->getAllBySession($current_school_session_id);
            $classCount = !empty($classes) ? $classes->count() : 0;

            // Fetch students count safely
            $studentCount = $this->userRepository->getAllStudentsBySessionCount($current_school_session_id) ?? 0;
            
            // Fetch male students count safely
            $promotionRepository = new PromotionRepository();
            $maleStudentsBySession = $promotionRepository->getMaleStudentsBySessionCount($current_school_session_id) ?? 0;

            // Fetch teachers count safely
            $teachers = $this->userRepository->getAllTeachers();
            $teacherCount = !empty($teachers) ? $teachers->count() : 0;
            
            // Fetch notices safely
            $noticeRepository = new NoticeRepository();
            $notices = $noticeRepository->getAll($current_school_session_id) ?? collect();

            $data = [
                'classCount'    => $classCount,
                'studentCount'  => $studentCount,
                'teacherCount'  => $teacherCount,
                'notices'       => $notices,
                'maleStudentsBySession' => $maleStudentsBySession,
            ];

            return view('home', $data);
        } catch (\Exception $e) {
            Log::error('Error loading dashboard: ' . $e->getMessage());
            return response()->view('errors.500', ['message' => 'An error occurred while loading the dashboard.'], 500);
        }
    }
}
