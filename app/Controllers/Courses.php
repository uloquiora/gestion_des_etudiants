<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Courses extends Controller
{
    public function index()
    {
        // Define the path to the directory where your PDFs are stored
        $directory = WRITEPATH . 'uploads/pdfs'; // Path to your PDFs directory
        $pdf_files = array_diff(scandir($directory), array('..', '.')); // Get list of files, excluding '.' and '..'

        // Pass the list of PDFs to the view
        return view('student/courses', ['pdf_files' => $pdf_files, 'directory' => $directory]);
    }
    public function download($file)
    {
        // Sanitize the file name to prevent path traversal attacks
        $filePath = WRITEPATH . 'uploads/pdfs/' . basename($file);

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    
}