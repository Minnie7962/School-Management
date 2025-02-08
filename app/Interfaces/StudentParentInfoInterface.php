<?php

namespace App\Interfaces;

interface StudentParentInfoInterface{
    public function store($data, $student_id);
    public function findByStudentId($student_id);
}