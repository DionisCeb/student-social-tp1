<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Student;

class ArticleController extends Controller
{
    public function store(Request $request, Student $student)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
        ]);

        // Create the article associated with the student
        $student->articles()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'publication_date' => $validated['date'],
        ]);

        return redirect()->route('student.show', $student->id)->with('success', 'Article created successfully!');
    }
}