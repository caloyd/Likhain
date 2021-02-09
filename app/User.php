<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const DELETED_AT = 'deactivated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type_id', 'first_name', 'middle_name', 'last_name', 'email', 'password', 'provider_avatar', 'provider', 'provider_id','last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserType()
    {
        return $this->belongsTo('App\UserType');
    }

    public function applicant()
    {
        return $this->hasOne('App\Applicant');
    }

    public function applicantEducationBackground()
    {
        return $this->hasManyThrough('App\ApplicantEducationBackground', 'App\Applicant');
    }

    public function applicantWorkExperience()
    {
        return $this->hasManyThrough('App\ApplicantWorkExperience', 'App\Applicant');
    }

    public function jobPosts()
    {
        return $this->hasMany('App\JobPost');
    }

    // public function jobApplications()
    // {
    //     return $this->hasMany('App\JobApplication');
    // }
    public function jobApplications()
    {
        return $this->hasManyThrough('App\JobApplication', 'App\Applicant');
    }
    public function employer()
    {
        return $this->hasOne('App\Employer');
    }

    public function employee()
    {
        return $this->hasOne('App\Employee');
    }

    public function employerShowJobPosts()
    {
        return $this->hasManyThrough('App\JobPost', 'App\Employer');
    }
    public function passwordSecurity()
    {
        return $this->hasOne('App\PasswordSecurity');
    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }
}
