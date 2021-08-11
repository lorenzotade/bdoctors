<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'education',
        'experience',
        'telephone',
        'cellphone',
        'picture'
    ];

    /* Link tables user-profile OneToOne */
    public function user(){
        $this->belongsTo('App\User');
    }
}
