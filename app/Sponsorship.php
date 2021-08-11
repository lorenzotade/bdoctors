<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'price'
    ];

    /* Link tables user-sponsorships OneToMany */
    public function users()
    {
    return $this->belongsToMany('App\User', 'user_sponsorship', 'user_id', 'sponsorship_id');
    }
}
