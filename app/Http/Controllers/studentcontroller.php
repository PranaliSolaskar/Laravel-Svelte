<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\classe;
use App\Models\Section;
use Inertia\Inertia;

class studentcontroller extends Controller
{
    public function index()
    {
        $student=Student::all();
        return Inertia::render('Students/Index',['students'=>$student,]);
    }

    public function getPaginatedData()
    {
        $records = Student::paginate(10);

        return response()->json($records);
    }

    public function create()
    {
        $classid=classe::all();
        $sectionid=Section::all();
        return Inertia::render('Students/Create',['classesid'=>$classid,'sections'=>$sectionid,]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'class_id' => 'required|integer',
            'section_id' => 'required|string|max:255',
        ]);
        
        Student::create($request->all());
        return response()->json(['message' => 'Student data saved successfully'], 201);
    }
}
