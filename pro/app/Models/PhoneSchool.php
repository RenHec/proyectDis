<?php

namespace App\Models;

use App\Models\School;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class PhoneSchool extends Model
{
    protected $table = 'phone_schools';
    protected $fillable = ['number','companies_id','schools_id'];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function schools()
    {
        return $this->belongsTo(School::class);
    }
}
