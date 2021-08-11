<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'title',
        'content',
        'vote'
    ];

    /* Link tables user-reviews OneToMany */
    public function user() {
        $this->belongsTo('App\User');
    }
}
