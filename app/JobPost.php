<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
   //  public function user()
   //  {
   //     return $this->belongsTo('App\User');  
   //  }
   public function currency()
   {
      return $this->belongsTo('App\Currency');  
   }
   public function jobApplications()
   {
      return $this->hasMany('App\JobApplication');
   }
   public function interview()
   {
      return $this->belongsTo('App\Interview');
   }
   //  public function employer()
   //  {
   //     return $this->belongsTo('App\Employer');
   //  }

}
