<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'graduation_year'
    ];

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }
}
