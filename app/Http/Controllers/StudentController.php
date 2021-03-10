<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created student.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'classe_id' => 'required|exists:classes,id',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer',
            'entry_year' => 'required|date_format:Y'
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        
        return Student::create($request->all());
    }

    /**
     * Display a student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return $student;
    }

    /**
     * Update a student.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'classe_id' => 'required|exists:classes,id',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer',
            'entry_year' => 'required|date_format:Y'
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        $student->update($request->all());
        return $student;
    }

    /**
     * Remove a student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        return $student->delete();
    }

    /**
     * Display a listing student's marks.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function marks(Student $student)
    {
        return $student->marks;
    }
}
