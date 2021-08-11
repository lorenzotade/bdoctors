<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['user_id', 'name', 'price'];

    /* Link tables user-services OneToMany */
    public function user() {
        $this->belongsTo('App\User');
    }
}
