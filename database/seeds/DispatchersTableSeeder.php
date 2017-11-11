<?php

use Illuminate\Database\Seeder;
use App\Dispatcher;

class DispatchersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $dispatchers = [
            ['Office A'],
            ['Office B'],
            ['Office C'],
            ['Office D']
        ];

        $count = count($dispatchers);

        foreach ($dispatchers as $key => $dispatcher) {
            Dispatcher::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'office_name' => $dispatcher[0]
            ]);
            $count--;
        }
    }
}
