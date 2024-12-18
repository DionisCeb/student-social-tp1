<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleTranslation;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function store(Request $request, Student $student)
    {
        // Validate the input
        $validated = $request->validate([
            'publication_date' => 'required|date',
            'title_en' => 'required|string|max:255',
            'content_en' => 'required|string',
            'title_fr' => 'required|string|max:255',
            'content_fr' => 'required|string',
        ]);

        // Create the main article
        $article = $student->articles()->create([
            'publication_date' => $validated['publication_date'],
        ]);

        // Create translations for the article
        $article->translations()->createMany([
            [
                'language' => 'en',
                'title' => $validated['title_en'],
                'content' => $validated['content_en'],
            ],
            [
                'language' => 'fr',
                'title' => $validated['title_fr'],
                'content' => $validated['content_fr'],
            ],
        ]);

        return redirect()->route('student.show', $student->id)->with('success', 'Article created successfully!');
    }

    public function edit(Article $article) {
         // Ensure only the author can access the edit page
         if ($article->student->user_id !== Auth::id()) {
            return redirect()->route('student.show', $article->student->id)
                ->withErrors('You are not authorizd to edit this article.');
         }

         // Load translations for editing
         $translation_en = $article->translation('en');
         $translation_fr = $article->translation('fr');

        return view('article.edit', compact('article', 'translation_en', 'translation_fr'));
    }

    public function update(Request $request, Article $article) {
         // Ensure only the author can update the article
         if ($article->student->user_id !== Auth::id()) {
            return redirect()->route('student.show', $article->student->id)
                ->withErrors("You are not authorized to update this article.");
         }

         //Validate the form data
         $validated = $request->validate([
            'publication_date' => 'required|date',
            'title_en' => 'required|string|max:255',
            'content_en' => 'required|string',
            'title_fr' => 'required|string|max:255',
            'content_fr' => 'required|string',
         ]);

         //Update the article with validated data
         $article->update([
            'publication_date' => $validated['publication_date'],
         ]);

         // Update translations for English and French
        $article->translations()->updateOrCreate(
            ['language' => 'en'],
            [
                'title' => $validated['title_en'],
                'content' => $validated['content_en'],
            ]
        );

        $article->translations()->updateOrCreate(
            ['language' => 'fr'],
            [
                'title' => $validated['title_fr'],
                'content' => $validated['content_fr'],
            ]
        );

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

        // Delete the translations 
        $article->translation()->delete();
        
        // Delete the article
        $article->delete();

        return redirect()->route('student.show', $article->student->id)
            ->with('success', 'Article deleted successfully!');
    }
}