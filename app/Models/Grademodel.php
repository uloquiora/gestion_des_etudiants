<?php namespace App\Models;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table = 'grades';  // Replace with your actual table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'subject', 'grade'];  // Adjust fields as needed

    public function getGradesByStudent($studentId)
    {
        return $this->where('student_id', $studentId)->findAll();
    }
}
