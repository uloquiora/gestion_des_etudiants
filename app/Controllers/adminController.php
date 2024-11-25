<?php namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Fetch all users
        return view('admin/dashboard', $data);
    }

    public function addUser()
    {
        return view('admin/add_user');
    }

    public function saveUser()
    {
        $userModel = new UserModel();

        $data = [
            'username'   => $this->request->getPost('username'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'       => $this->request->getPost('role'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $this->request->getPost('email'),
            'class'      => $this->request->getPost('class'),
        ];

        $userModel->save($data);
        return redirect()->to('/admin/dashboard')->with('message', 'User added successfully.');
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
}
