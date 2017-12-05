<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            ['John', 'Adams', 'sales', 'john@example.com', '111www222eeee333rrr444ttt555yyy666uuu666', '1234567899', 9876543211, 123, 4567897899, 1],
            ['George', 'Washington', 'dispatcher', 'george@example.com', '211www222eeee333rrr444ttt555yyy666uuu666', '1234567899', 9876543211, 123, 4567897899, 1],
            ['Thomas', 'Jefferson', 'sales', 'tom@example.com', '311www222eeee333rrr444ttt555yyy666uuu666', '1234567899', 9876543211, 123, 4567897899, 1],
            ['Benjamin', 'Franklin', 'dispatcher', 'ben@example.com', '411www222eeee333rrr444ttt555yyy666uuu666', '1234567899', 9876543211, 123, 4567897899, 1],
        ];

        $count = count($contacts);

        foreach ($contacts as $key => $contact) {
            Contact::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count - 1)->toDateTimeString(),
                'first_name' => $contact[0],
                'last_name' => $contact[1],
                'title' => $contact[2],
                'email' => $contact[3],
                'email_hash' => $contact[4],
                'telephone' => $contact[5],
                'mobile' => $contact[6],
                'extension' => $contact[7],
                'fax' => $contact[8],
                'country_code' => $contact[9],
                'dispatcher_id' => 1,
            ]);
            $count--;
        }
    }
}
