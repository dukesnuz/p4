<?php
/*************************
* Class used to refresh and re-seed Database
* Used for development only
*/
namespace App\Utilities;

use Artisan;
use App\Dispatcher;

class ResetDatabase
{
    /*
    * Debugging/demo helper method to "blank slate" the database
    * Used when practicing queries
    */
    public static function resetDatabase()
    {
        dump('Clearing and re-seeding database');
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }
}
