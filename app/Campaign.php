<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function Contacts()
    {
        // Using withTimestamps() pivot table will auto update
        // Using withPivot('opt_out') to get data from the pivot table
        return $this->belongsToMany('App\Contact')->withTimestamps()->withPivot('opt_out');
    }
}
