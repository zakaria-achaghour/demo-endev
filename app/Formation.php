<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['designation', 'vh', 'prix','ref','description'];


    public function sessions()
    {
        return $this->belongsToMany('App\Session')
            ->withTimestamps();
    }
}
