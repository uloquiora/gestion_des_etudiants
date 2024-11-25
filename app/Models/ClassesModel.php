<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassesModel extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'teacher_id', 'created_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
