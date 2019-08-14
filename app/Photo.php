<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['filename'];

    // public function imageable(){
    //     return $this->morphTo();
    // }

    public function products(){
        return $this->morphedByMany('App\Product', 'imageable');
    }

    public function posts(){
        return $this->morphedByMany('App\Post', 'imageable');
    }
}
