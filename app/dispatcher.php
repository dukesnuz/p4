<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispatcher extends Model
{
    use SoftDeletes;

    public function contacts()
    {
        // Dispather has many contacts
        return $this->hasMany('App\Contact');
    }

    /* prevents mass assignment error in Dispatcher Controller
    * in contactStore method
    */
    protected $fillable = ['office_name'];
    /*
    * Dump essential details onto the page
    */
    // Below not working
    public static function dump($results = null)
    {
        return 'dump';
        /*$data = [];

        if (is_null($results)) {
        $results = self::all();
    }

    foreach ($results as $result) {
    $data[] = $result->first_name;
}
dump($data);*/
}
}
