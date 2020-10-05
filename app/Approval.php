<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $guarded = [];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    public function scopeIsApproved()
    {
        return $this->is_approved == true ? 'Approved' : 'Rejected';
    }
}
