<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonSchool extends Model
{
    protected $table = 'person_schools';
    protected $fillable = ['schools_id','people_id'];
}
