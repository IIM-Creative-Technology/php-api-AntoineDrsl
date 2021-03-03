<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'classe_id',
        'teacher_id',
        'name',
        'start',
        'end'
    ];

    public function classe()
    {
        return $this->belongsTo('App\Models\Classe');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function marks()
    {
        return $this->hasMany('App\Models\Mark');
    }
}
