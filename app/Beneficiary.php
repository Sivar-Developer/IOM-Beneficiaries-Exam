<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $guarded = [];
    protected $appends = ['score','age'];

    public function getScoreAttribute()
    {
        $score = 0;
        $this->gender == 'Female' ? ($score = $score+10) : NULL;
        $this->martial_status == 'Married' ? ($score = $score+10) : NULL;
        $this->martial_status == 'Divorced' ? ($score = $score+5) : NULL;
        $this->age > 0 && $this->age <= 17 ? ($score = $score+5) : NULL;

        return $score;
    }

    public function getAgeAttribute()
    {
        return $this->birthdate ? \Carbon\Carbon::parse($this->birthdate)->age : NULL;
    }
}
