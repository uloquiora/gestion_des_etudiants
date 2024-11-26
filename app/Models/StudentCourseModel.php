<?php namespace App\Models;

use CodeIgniter\Model;

class StudentCourseModel extends Model
{
    protected $table      = 'student_courses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'course_id'];
}
