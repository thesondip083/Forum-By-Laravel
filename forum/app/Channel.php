<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable=['channel_name','slug'];

    public function discussions()
    {
       return $this->hasMany('App\Discussion');
    }
}
