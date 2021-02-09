<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'id',
        'applicant_id',
        'employer_id',
        'job_post_id',
        'interview_id',
        'job_offer_time',
        'job_offer_date',
        'job_offer_address',
        'contact_name',
        'views'
    ];
}
