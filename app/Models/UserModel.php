<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';  // Ensure this matches your table name
    protected $primaryKey = 'id';  // Primary key field
    protected $allowedFields = ['username', 'password', 'role', 'first_name', 'last_name', 'email', 'class'];  // Fields that can be inserted/updated
}
