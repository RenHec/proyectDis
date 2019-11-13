<?php

namespace App\Models;

use App\Models\Person;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['name'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}