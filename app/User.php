<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name', 
        'slug', 
        'email', 
        'password', 
        'street', 
        'postal_code', 
        'city', 
        'gender'
    ];

    /* Link tables user-specs ManyToMany */
    public function specs()
    {
        return $this->belongsToMany('App\Spec', 'user_spec', 'user_id', 'spec_id');
    }

    /* Collegamento tabelle user-profile OneToOne */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /* Link tables user-reviews OneToMany */
    public function reviews() 
    {
        return $this->hasMany('App\Review');
    }

    /* Link tables user-messages OneToMany */
    public function messages() 
    {
        return $this->hasMany('App\Message');
    }

    /* Link tables user-services OneToMany */
    public function services() 
    {
        return $this->hasMany('App\Service');
    }

    /* Link tables user-sponsorships OneToMany */
    public function sponsorships()
    {
        return $this->belongsToMany('App\Sponsorship', 'user_sponsorship', 'user_id', 'sponsorship_id')->withPivot('due_date');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
