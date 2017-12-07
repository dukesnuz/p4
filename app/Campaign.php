<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function Contacts()
    {
        return $this->belongsToMany('App\Contact')->withTimestamp();
    }
}
