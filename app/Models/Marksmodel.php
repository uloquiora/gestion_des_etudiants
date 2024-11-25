<?php

namespace App\Models;

use CodeIgniter\Model;

class MarksModel extends Model
{
    protected $table = 'marks';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'exam_id', 'student_id', 'marks', 'created_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
