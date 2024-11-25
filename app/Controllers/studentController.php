<?php namespace App\Controllers;



class studentController extends BaseController
{
    
    public function index(): string
    {
        return view('student_dashboard');
    }
}
