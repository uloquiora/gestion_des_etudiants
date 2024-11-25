<?php

namespace App\Models;

use CodeIgniter\Model;

class ExamsModel extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'class_id', 'subject', 'exam_date', 'created_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
