<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserService implements UserInterface
{
    public function createTeacher($request)
    {
        // Implement createTeacher method
    }

    public function updateTeacher($request)
    {
        // Implement updateTeacher method
    }

    public function createStudent($request)
    {
        // Implement createStudent method
    }

    public function updateStudent($request)
    {
        // Implement updateStudent method
    }

    public function getAllStudents($current_session, $class_id, $section_id)
    {
        // Implement getAllStudents method
    }

    public function getAllStudentsBySession($session_id)
    {
        // Implement getAllStudentsBySession method
    }

    public function getAllStudentsBySessionCount($session_id)
    {
        // Implement getAllStudentsBySessionCount method
    }

    public function findStudent($id)
    {
        // Implement findStudent method
    }

    public function findTeacher($id)
    {
        // Implement findTeacher method
    }

    public function getAllTeachers()
    {
        // Implement getAllTeachers method
    }

    public function changePassword($new_password)
    {
        // Implement changePassword method
    }

    public function getAllUsers()
    {
        return User::all();
    }
}