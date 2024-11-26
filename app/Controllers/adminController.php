<?php namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
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
        $data['users'] = $userModel->findAll();  // Fetch all users
        
        // Pass the user data to the view
        $data['user'] = $user;

        return view('admin/dashboard', $data);
    }


    public function addUser()
    {
        return view('admin/add_user');
    }

    public function saveUser()
{
    $userModel = new UserModel();
    $db = \Config\Database::connect();

    // Start a transaction
    $db->transBegin();

    try {
        // Save user data to `users` table
        $userData = [
            'username'   => $this->request->getPost('username'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'       => $this->request->getPost('role'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $this->request->getPost('email'),
            'class'      => $this->request->getPost('class'),
        ];
        $userModel->save($userData);

        // Get the ID of the newly added user
        $userId = $userModel->getInsertID();

        // Insert into additional tables based on the role
        $role = $this->request->getPost('role');
        if ($role === 'student') {
            $db->table('students')->insert([
                'user_id'    => $userId,
                'class'      => $this->request->getPost('class'),
                'first_name' => $this->request->getPost('first_name'),
                'last_name'  => $this->request->getPost('last_name'),
            ]);
        } elseif ($role === 'teacher') {
            $db->table('teachers')->insert([
                'user_id'    => $userId,
                'first_name' => $this->request->getPost('first_name'),
                'last_name'  => $this->request->getPost('last_name'),
                'email'      => $this->request->getPost('email'),
            ]);
        }

        // Commit the transaction
        $db->transCommit();

        return redirect()->to('/admin/dashboard')->with('message', 'User added successfully.');

    } catch (\Exception $e) {
        $db->transRollback();

        return redirect()->to('/admin/dashboard')->with('error', 'Failed to add user: ' . $e->getMessage());
    }
}



    public function editUser($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User not found.");
        }

        return view('admin/edit_user', $data);
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
        return redirect()->to('/admin/dashboard')->with('message', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/admin/dashboard')->with('message', 'User deleted successfully.');
    }
    public function logout()
{
   
    session()->destroy();

   
    return redirect()->to('/');
}

}
