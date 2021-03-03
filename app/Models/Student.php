<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'classe_id',
        'firstname',
        'lastname',
        'age',
        'entry_year'
    ];

    public function classe()
    {
        return $this->belongsTo('App\Models\Classe');
    }

    public function marks()
    {
        return $this->hasMany('App\Models\Mark');
    }
}
