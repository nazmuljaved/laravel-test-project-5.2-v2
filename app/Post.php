<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	 protected $fillable = [
        'first_name', 'middle_name', 'last_name','gender', 'dob','nationality','nid','email','phone_no','about_me'
    ];
     public function user()
    {
    	
       return $this->belongsTo('App\User'); //Profile is your profile model
    }
}
