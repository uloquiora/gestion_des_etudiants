<?php


namespace App\Controllers;

use CodeIgniter\Controller;

class upload extends Controller
{
    public function index()
    {
        return view('admin/upload_courses');
    }

    public function upload()
    {
        $file = $this->request->getFile('pdf');

        // Check if the file is valid
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'There was an error uploading the file.');
        }

        // Check if the uploaded file is a PDF
        if ($file->getExtension() != 'pdf') {
            return redirect()->back()->with('error', 'Only PDF files are allowed.');
        }

        // Define the upload path (within writable/uploads/pdfs)
        $uploadPath = WRITEPATH . 'uploads/pdfs/';

        // Generate a unique name for the file
        $newFileName = $file->getRandomName();

        // Move the uploaded file to the destination folder
        if ($file->move($uploadPath, $newFileName)) {
            return redirect()->to('/upload_courses')->with('success', 'PDF uploaded successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to upload the PDF.');
        }
    }
}
