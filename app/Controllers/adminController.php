<?php

namespace App\Controllers;

class adminController extends BaseController
{
    public function index(): string
    {
        return view('admin_dashboard');
    }
}
