<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Student;

class FileController extends Controller
{
    public function upload(Request $request, Student $student)
    {
        // Ensure the user is authorized
        if ($student->user_id !== auth()->id()) {
            return redirect()->route('student.show', $student->id)
                ->withErrors('You are not authorized to upload files for this student.');
        }

        // Validate the uploaded file
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'upload_date' => 'required|date',
            'file' => 'required|file|mimes:pdf,zip,doc,docx|max:20480', // Max file size: 20MB
        ]);

        // Store the uploaded file
        $filePath = $request->file('file')->store('uploads/files', 'public');

        // Save file information to the database
        File::create([
            'student_id' => $student->id,
            'title' => $validated['title'],
            'upload_date' => $validated['upload_date'],
            'file_path' => $filePath,
        ]);

        return redirect()->route('student.show', $student->id)
            ->with('success', 'File uploaded successfully!');
    }

    public function download(File $file) {
        // Verifier si le fichier exists
        if (Storage::exists($file->file_path)) {
            // retourner le fichier pour le telecharger
            return Storage::download($file->file_path);
        } else {
            return redirect()->back()->withErrors("The requested file could not be found");
        }
    }

    public function destroy(File $file) {
        //Seules les utilisateurs authentifie peuvent effacer ce fichiers
        if ($file->student->user_id !== auth()->id()) {
            return redirect()->route('student.show', $file->student->id) 
                ->withErrors('You are not authorized to delete this file.');
        }

        //Effacer depuis le stockage local
        if (Storage::exists($file->file_path)) {
            Storage::delete($file->file_path);
        }

        //effacer depuis la base de donnees
        $file->delete();

        return redirect()->route('student.show', $file->student->id)
            ->with('success', 'File deleted successfully!');
    }   
}
