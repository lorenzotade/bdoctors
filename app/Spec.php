<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
   protected $fillable = ['name', 'slug'];

   /* Link tables user-specs ManyToMany */
    public function users()
    {
    return $this->belongsToMany('App\User', 'user_spec', 'user_id', 'spec_id');
    }
}
