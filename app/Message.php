<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'object',
        'email',
        'content'
    ];

    /* Link tables user-messages OneToMany */
    public function user() {
        $this->belongsTo('App\User');
    }
}
