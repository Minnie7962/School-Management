<?php
namespace App\Repositories;

use App\Interfaces\StudentInfoInterface;
use App\Models\StudentInfo;

class StudentInfoRepository implements StudentInfoInterface 
{
    public function store($data, $student_id) 
    {
        try {
            return StudentInfo::updateOrCreate(
                ['student_id' => $student_id],
                [
                    'board_reg_no' => $data['board_reg_no'] ?? null,
                    'class_id' => $data['class_id'] ?? null,
                    'section_id' => $data['section_id'] ?? null
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception('Failed to create/update student information: ' . $e->getMessage());
        }
    }

    public function findByStudentId($student_id) 
    {
        return StudentInfo::where('student_id', $student_id)->first();
    }
}