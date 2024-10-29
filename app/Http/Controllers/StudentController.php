<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\City;

class StudentController extends Controller
{




    public function index()
    {
        $students = Student::with('city')->get();

        return view('student.index', ['students' => $students]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('student.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city_id' => 'required|exists:cities,id',
            'birth_date' => 'required|date',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|unique:students,email',
        ]);

        // Create the new student
        Student::create($validated);

        // Redirect to the students list with a success message
        return redirect()->route('student.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $cities = City::all();
        return view('student.edit', compact('student', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city_id' => 'required|exists:cities,id',
            'birth_date' => 'required|date',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        // Update only if validation is succesful
        $student->update($validated);
        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
    }
}
