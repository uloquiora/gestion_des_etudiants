<?php namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $allowedFields = ['course_name', 'course_code', 'description'];

    // Validation rules for course
    protected $validationRules = [
        'course_name' => 'required|min_length[3]',
        'course_code' => 'required|alpha_numeric|min_length[5]',
        'description'  => 'required|min_length[10]',
    ];
}
