<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    
    protected $fillable = [
        'name', 'Details','facultyId'  
    ];


    public function users()
        {
            return $this->belongsToMany('App\User');
        }
    }

