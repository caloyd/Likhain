<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    public function applicant()
    {
        return $this->belongsTo('App\Applicant');
    }
    public function jobPost()
    {
        return $this->belongsTo('App\JobPost');
    }
    public function jobApplicantApplied()
    {
        return $this->hasOneThrough('App\Applicant','App\User');
    }


}
