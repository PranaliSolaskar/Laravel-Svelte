<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\classe;
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
        echo"kkkkkk";
        $classid=classe::all();
        echo"kkkkkkoooo";
        return Inertia::render('Students/Create',['classesid'=>$classid,]);
    }
}
