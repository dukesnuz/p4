<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $addresses = [
            ['1 Main st', 100, 'Boston', 'Ma', '11111', 'US', 'street'],
            ['2 Main st', 101, 'Boston', 'Ma', '22222', 'US', 'street'],
            ['3 Main st', 102, 'Boston', 'Ma', '33333', 'US', 'street'],
            ['4 Main st', 103, 'Boston', 'Ma', '44444', 'US', 'street'],
            ['PO Box 1', null, 'Boston', 'Ma', '55555', 'US', 'mailing'],
            ['PO Box 2', null, 'Boston', 'Ma', '66666', 'US', 'mailing'],
            ['PO Box 3', null, 'Boston', 'Ma', '77777', 'US', 'mailing'],
            ['PO Box 4', null, 'Boston', 'Ma', '88888', 'US', 'mailing']
        ];

        $count = count($addresses);

        foreach ($addresses as $key => $address) {
            Address::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count - 1)->toDateTimeString(),
                'address' => $address[0],
                'suite' => $address[1],
                'city' => $address[2],
                'state' => $address[3],
                'zip' => $address[4],
                'country' => $address[5],
                'type' => $address[6],
            ]);
            $count--;
        }
    }
}
