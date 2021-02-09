<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        'user_id', 'company_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
 
}
