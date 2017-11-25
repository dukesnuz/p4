<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispatcher extends Model
{
    use SoftDeletes;
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
