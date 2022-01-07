<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguages extends Model
{
    protected $table = 'programminglanguages';
    protected $fillable = ['name','video','module',];
}
