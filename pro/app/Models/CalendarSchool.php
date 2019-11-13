<?php

namespace App\Models;

use App\Models\Person;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarSchool extends Model
{
    use SoftDeletes;

    protected $table = 'calendar_schools';
    protected $fillable = ['date','schools_id','people_id'];
    protected $dates = ['deleted_at'];

    public function person()
    {
        return $this->hasOne(Person::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
