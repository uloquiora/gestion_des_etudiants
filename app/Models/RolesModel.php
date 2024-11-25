<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'created_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
