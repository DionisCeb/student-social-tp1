<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{




    public function index()
    {
        $students = Student::with('city')->get();

        return view('student.index', ['students' => $students]);
    }




    /**
     * Afficher le formulaire de création d'une nouvelle étudiant
     */
    public function create()
    {
        $cities = City::all();
        return view('student.create', ['cities' => $cities]);
    }

    /**
     * Enregistrer les données sur la création de l'étudiant
     */
    public function store(Request $request)
    {
        
        // Valider les données
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city_id' => 'required|exists:cities,id',
            'birth_date' => 'required|date',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|unique:students,email',
        ]);

        // Add the user_id of the currently authenticated user
        $validated['user_id'] = Auth::id();

        // Créer le nouvel étudiant
        Student::create($validated);

        // Redirection vers la liste des étudiants avec un message de réussite
        return redirect()->route('student.index')->with('success', 'Student created successfully!');
    }

    /**
     * Afficher les détails de l'étudiant spécifique
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Afficher le formulaire d'édition de l'étudiant
     */
    public function edit(Student $student)
    {
        $cities = City::all();
        return view('student.edit', compact('student', 'cities'));
    }

    /**
     * Mettre à jour les informations de l'étudiant
     */
    public function update(Request $request, Student $student)
    {
        // Ensure that only the student creator (user) can update their record
        if ($student->user_id !== Auth::id()) {
            return redirect()->route('student.index')->withErrors('You are not authorized to update this student.');
        }

        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city_id' => 'required|exists:cities,id',
            'birth_date' => 'required|date',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        // Mettre à jour uniquement si la validation est réussie
        $student->update($validated);
        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Supprimer l'étudiant
     */
    public function destroy(Student $student)
    {
        // Ensure that only the student creator (user) can update their record
        if ($student->user_id !== Auth::id()) {
            return redirect()->route('student.index')->withErrors('You are not authorized to delete this student.');
        }
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
    }
}
