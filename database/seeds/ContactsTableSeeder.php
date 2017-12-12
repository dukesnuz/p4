<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    * @return void
    */
    public function run()
    {
        $contacts = [
            ['John', 'Adams', 'sales', 'david@ajaxtransport.com', 1, 1234567899, 9876543211, 123, 4567897899, 1],
            ['George', 'Washington', 'dispatcher', 'david@davidpetringa.com', 1, 1234567899, 9876543211, 123, 4567897899, 1],
        ];

        $count = count($contacts);

        foreach ($contacts as $key => $contact) {
            $id = $key + 1;
            Contact::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count - 1)->toDateTimeString(),
                'first_name' => $contact[0],
                'last_name' => $contact[1],
                'title' => $contact[2],
                'email' => $contact[3],
                'email_hash' => sha1($contact[3]),
                'telephone' => $contact[5],
                'mobile' => $contact[6],
                'extension' => $contact[7],
                'fax' => $contact[8],
                'country_code' => $contact[9],
                'dispatcher_id' => $id,
            ]);
            $count--;
        }
    }
}
