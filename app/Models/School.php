<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_name', 'year_founded', 'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
