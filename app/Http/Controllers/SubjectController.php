<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subject::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->dateDifferenceValidator();

        $validator = Validator::make($request->all(), [
            'classe_id' => 'required|exists:classes,id',
            'teacher_id' => 'required|exists:teachers,id',
            'name' => 'required|string',
            'start' => 'required|date_format:Y-m-d',
            'end' => 'required|date_format:Y-m-d|after:start|date_difference:start,5'
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        
        return Subject::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return $subject;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $this->dateDifferenceValidator();

        $validator = Validator::make($request->all(), [
            'classe_id' => 'required|exists:classes,id',
            'teacher_id' => 'required|exists:teachers,id',
            'name' => 'required|string',
            'start' => 'required|date_format:Y-m-d',
            'end' => 'required|date_format:Y-m-d|after:start|date_difference:start,5'
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        $subject->update($request->all());
        return $subject;
    }

    private function dateDifferenceValidator()
    {
        Validator::extend('date_difference', function ($attribute, $value, $parameters, $validator) {
            $firstArgument = Arr::get($validator->getData(), $parameters[0], null);
            if(!$firstArgument) {
                return false;
            }
            $firstDate = Carbon::createFromFormat('Y-m-d', $firstArgument);
            $secondDate = Carbon::createFromFormat('Y-m-d', $value);
            $difference = $parameters[1];
            if($firstDate->diffInDays($secondDate) > $difference) {
                return false;
            }
            return true;
        });
    }
}
