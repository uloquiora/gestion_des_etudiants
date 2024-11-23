<?php

namespace App\Controllers;

class teacherController extends BaseController
{
    public function index(): string
    {
        return view('teacher_dashboard');
    }
}
