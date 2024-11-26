<?php namespace App\Models;

use CodeIgniter\Model;

class ExamModel extends Model
{
    protected $table      = 'exams';
    protected $primaryKey = 'exam_id';
    protected $allowedFields = ['course_id', 'exam_date', 'exam_type', 'duration'];

    // Validation rules for exam
    protected $validationRules = [
        'course_id' => 'required|integer',
        'exam_date' => 'required|valid_date',
        'exam_type' => 'required|min_length[3]',
        'duration'  => 'required|integer',
    ];

    // Define relationship to course
    public function getExamsForCourse($courseId)
    {
        return $this->where('course_id', $courseId)->findAll();
    }
}
