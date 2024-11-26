<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('user')['logged_in']) {
            return redirect()->to('/login'); // Redirect to login page if not logged in
        }

        $userId = $session->get('user')['user_id'];
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        return view('profile', ['user' => $user]);
    }

    public function edit()
    {
        $session = session();
        if (!$session->get('user')['logged_in']) {
            return redirect()->to('/login'); // Redirect to login page if not logged in
        }

        $userId = $session->get('user')['user_id'];
        $userModel = new UserModel();

        $userData = [
            'email' => $this->request->getPost('email')
        ];

        $userModel->update($userId, $userData);

        return redirect()->to('/profile')->with('success', 'Profile updated successfully.');
    }
}
