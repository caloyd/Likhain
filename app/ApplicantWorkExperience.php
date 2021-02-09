<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantWorkExperience extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'applicant_id', 'currency_id', 'company_name', 'job_title', 'date_from', 'date_to', 'previous_salary', 'description'
    ];

    public function applicant()
    {
        return $this->belongsTo('App\Applicant');
    }
}
