<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'currency_id', 'gender', 'birth_date', 'address', 'avatar_image_path', 'contact_number', 'expected_salary'
    ];

    public function skills()
    {
        return $this->belongsToMany('App\Skill', 'applicant_skills')->withPivot('years_of_experience');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function SocialFacebookAccount()
    // {
    //     return $this->belongsTo('App\SocialFacebookAccount');
    // }

    public function SocialFacebookAccount()
    {
        return $this->hasMany(SocialFacebookAccount::class);
    }
    
    public function applicantWorkExperiences()
    {
        return $this->hasMany('\App\ApplicantWorkExperience');
    }

    public function applicantEducationBackground()
    {
        return $this->hasOne('\App\ApplicantEducationBackground');
    }

    public function applicantSkills()
    {
        return $this->hasMany('\App\ApplicantSkill');
    }


}
