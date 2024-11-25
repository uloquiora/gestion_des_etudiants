<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'student_id', 'exam_id', 'status', 'created_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
