<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','reg_number','school_name', 'candidate_agendas','About_user','designation',
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
    

  public function schools()
  {
      return $this->belongsToMany('App\School');
  }
   public function roles()
        {
            return $this->belongsToMany('App\Role');
        }
        public function candidates()
        {
            return $this->belongsToMany('App\Candidate');
        }
      public function polls()
      {
          return $this->hasMany('App\Poll', 'user_id');
      }
      public function poll()
      {
          return $this->belongsToMany('App\Poll','voter_id');
      }
       

   public function hasAnyRoles($roles){
       if($this->roles()->whereIn('name',$roles)->first()){
           return true;
       }
       return false;
   }
   public function hasRole($role){
    if($this->roles()->where('name',$role)->first()){
        return true;
    }
    return false;
}     
    }

