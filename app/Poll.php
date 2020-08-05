<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
        'name', 'start_date','end_date',  
    ];
    //
    public function candidate() {
        return $this->belongsto('App\Candidate');
    }

   public function users()
   {
       return $this->belongsTo('App\User', 'user_id');
   }
   public function user()
   {
       return $this->belongsTo('App\User', 'voter_id');
   }
}
