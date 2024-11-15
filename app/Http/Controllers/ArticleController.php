<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

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

    public function edit(Article $article) {
         // Ensure only the author can access the edit page
         if ($article->student->user_id !== Auth::id()) {
            return redirect()->route('student.show', $article->student->id)
                ->withErrors('You are not authorizd to edit this article.');
         }
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, Article $article) {
         // Ensure only the author can update the article
         if ($article->student->user_id !== Auth::id()) {
            return redirect()->route('student.show', $article->student->id)
                ->withErrors("You are not authorized to update this article.");
         }

         //Validate the form data
         $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
         ]);

         //Update the article with validated data
         $article->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'date' => $validated['date'],
         ]);

         return redirect()->route('student.show', $article->student->id)
            ->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        // Ensure only the author can delete the article
        if ($article->student->user_id !== Auth::id()) {
            return redirect()->route('student.show', $article->student->id)
                ->withErrors('You are not authorized to delete this article.');
        }

        // Delete the article
        $article->delete();

        return redirect()->route('student.show', $article->student->id)
            ->with('success', 'Article deleted successfully!');
    }
}