<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $fillable = [
        'company_email', 'contact_number', 'company_name','registration_number'
    ];
    protected $table = 'companies';

    public function employers()
    {
        return $this->hasMany('App\Employer');
    }
    
}
