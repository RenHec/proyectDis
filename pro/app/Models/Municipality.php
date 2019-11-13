<?php

namespace App\Models;

use App\Models\Person;
use App\Models\School;
use App\Models\Departament;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';
    protected $fillable = ['name'];

    public function setNameAttribute($valor) {
        $this->attributes['name'] = strtoupper($valor);    
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
