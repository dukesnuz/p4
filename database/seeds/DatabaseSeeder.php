<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $this->call(DispatchersTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(CampaignsTableSeeder::class);
        $this->call(CampaignContactTableSeeder::class);
        //$this->call(AddressesTableSeeder::class);
    }
}
