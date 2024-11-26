<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StudentModel;

class studentController extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user')['user_id'];  // Get logged-in user ID from session

        // Fetch user details
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        // Get counts of students and teachers
        $data['studentCount'] = $userModel->where('role', 'student')->countAllResults();
        $data['teacherCount'] = $userModel->where('role', 'teacher')->countAllResults();

        // Fetch only students
        $data['users'] = $userModel->where('role', 'student')->findAll();  // Fetch only students
        
        // Pass the user data to the view
        $data['user'] = $user;

        return view('student/dashboard', $data);
    }
    public function logout()
{
    session()->destroy();
    return redirect()->to('/');
}
public function editUser($id)
{
    $userModel = new UserModel();
    $data['user'] = $userModel->find($id);

    if (!$data['user']) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("User not found.");
    }

    return view('student/edit_profile', $data);
}

public function updateUser($id)
{
    $userModel = new UserModel();

    $data = [
        'id'         => $id,
        'username'   => $this->request->getPost('username'),
        'role'       => $this->request->getPost('role'),
        'first_name' => $this->request->getPost('first_name'),
        'last_name'  => $this->request->getPost('last_name'),
        'email'      => $this->request->getPost('email'),
        'class'      => $this->request->getPost('class'),
    ];

    // Update password only if it's provided
    if ($this->request->getPost('password')) {
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $userModel->save($data);
    return redirect()->to('/student/dashboard')->with('message', 'User updated successfully.');
}

    
}
