<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantSkill extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'years_of_experiece'
    ];
}
