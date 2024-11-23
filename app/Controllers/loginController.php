<?php

namespace App\Controllers;

use App\Models\UserModel;

class loginController extends BaseController
{
    public function index()
    {
        // Load the login view
        return view('login');
    }

    public function authenticate()
    {
        // Start session
        $session = session();

        // Get input data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Load UserModel
        $userModel = new UserModel();

        // Check if user exists
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session data
                $session->set('user', [
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'role'      => $user['role'],
                    'logged_in' => true,
                ]);

                // Redirect based on role
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin/dashboard');
                } elseif ($user['role'] === 'teacher') {
                    return redirect()->to('/teacher/dashboard');
                } else {
                    return redirect()->to('/student/dashboard');
                }
            } else {
                // Invalid password
                return redirect()->back()->with('error', 'Invalid password.');
            }
        } else {
            // User not found
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    public function logout()
    {
        // Destroy session
        $session = session();
        $session->destroy();

        // Redirect to login page
        return redirect()->to('/login');
    }
}
