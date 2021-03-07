<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClasseController extends Controller
{
    /**
     * Display a listing of classes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Classe::all();
    }

    /**
     * Store a newly created class.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'graduation_year' => 'required'
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        return Classe::create($request->all());
    }

    /**
     * Display a class.
     *
     * @param  \App\Models\Classe  $class
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $class)
    {
        return $class;
    }

    /**
     * Update a class.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $class)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'graduation_year' => 'required'
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        
        $class->update($request->all());
        return $class;
    }

    /**
     * Display a listing of students in a class.
     *
     * @param  \App\Models\Classe  $class
     * @return \Illuminate\Http\Response
     */
    public function students(Classe $class)
    {
        return $class->students;
    }
}
