<?php

namespace App\Repositories;

use App\Models\StudentInfo;

class StudentAcademicInfoRepository {
    public function store($request, $student_id) {
        try {
            StudentInfo::create([
                'student_id'        => $student_id,
                'board_reg_no'      => $request['board_reg_no'],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create Student information. '.$e->getMessage());
        }
    }
}