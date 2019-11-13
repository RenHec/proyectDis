<?php

namespace App\Models;

use App\Models\Year;
use App\Models\Person;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balances';
    protected $fillable = ['balance','start_date','end_date','positive_balance','schools_id',
                          'people_id','years_id'];

    public function person()
    {
        return $this->hasOne(Person::class);
    }

    public function year()
    {
        return $this->hasOne(Year::class);
    }

    public function schools()
    {
        return $this->belongsTo(School::class);
    }
}
