<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Beneficiary extends Model
{
    protected $guarded = [];
    protected $appends = ['score','age','employment','photoPath'];

    public function getPhotoPathAttribute()
    {
        return $this->photo ? (Str::startsWith($this->photo, 'https://') ? $this->photo : config('app.url').'/contents/photos/'.$this->photo) : NULL;
    }

    public function getScoreAttribute()
    {
        $score = 0;
        $this->gender == 'Female' ? ($score = $score+10) : NULL;
        $this->martial_status == 'Married' ? ($score = $score+10) : NULL;
        $this->martial_status == 'Divorced' ? ($score = $score+5) : NULL;
        $this->age > 0 && $this->age <= 17 ? ($score = $score+5) : NULL;
        $this->age > 60 ? ($score = $score+10) : NULL;
        $this->employment_status == false ? ($score = $score+10) : NULL;

        return $score;
    }

    public function getAgeAttribute()
    {
        return $this->birthdate ? \Carbon\Carbon::parse($this->birthdate)->age : NULL;
    }

    public function getEmploymentAttribute()
    {
        return $this->employment_status == true ? 'Employed' : 'Un-Employed';
    }

    public function Approval()
    {
        return $this->hasOne(Approval::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('mark','created_at','updated_at');
    }
}
