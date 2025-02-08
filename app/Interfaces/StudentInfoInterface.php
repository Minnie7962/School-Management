<?php
namespace App\Interfaces;

interface StudentInfoInterface 
{
    public function store($data, $student_id);
    public function findByStudentId($student_id);
}