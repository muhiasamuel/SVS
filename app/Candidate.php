<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function polls() {
        return $this->hasMany('App\User');
    }

    public function user() {
        return $this->hasOne('App\User');
    }
}
