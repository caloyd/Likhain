<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'id',
        'applicant_id',
        'employer_id',
        'job_post_id',
        'views'
    ];

    public function jobPost()
    {
        return $this->hasMany('App\JobPost');
    }
}
