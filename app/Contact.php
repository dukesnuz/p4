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
}
