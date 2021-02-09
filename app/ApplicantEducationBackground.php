<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantEducationBackground extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'applicant_id', 'education_attainment', 'course_degree', 'school', 'description', 'date_from', 'date_to',
    ];

    public function applicant()
    {
        return $this->belongsTo('App\Applicant');
    }
}
