<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function Contacts()
    {
        // Using withTimestamps() pivot table will auto update
        return $this->belongsToMany('App\Contact')->withTimestamps();
    }
}
