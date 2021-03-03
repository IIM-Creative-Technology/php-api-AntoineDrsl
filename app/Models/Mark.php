<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'student_id',
        'subject_id',
        'value'
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
