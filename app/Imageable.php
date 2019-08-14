<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imageable extends Model
{
    protected $fillable = ['photo_id', 'imageable_id', 'imageable_type'];
}
