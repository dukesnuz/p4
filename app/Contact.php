<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function dispatcher()
    {
        // Define inverse of one-to-many
        return $this->belongsTo('App\Dispatcher');
    }

    public function campaigns()
    {
        // Using withTimestamp() ensures pivot table will auto update
        return $this->belongsToMany('App\Campaign')->withTimestamps();
    }
}
