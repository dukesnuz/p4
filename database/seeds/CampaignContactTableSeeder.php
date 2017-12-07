<?php

use Illuminate\Database\Seeder;
use App\Campaign;
use App\Contact;

class CampaignContactTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

        $contacts = [
            'John' => ['Campaign 1', 'Campaign 2'],
            'George' => ['Campaign 3', 'Campaign 4'],
            'Thomas' => ['Campaign 1', 'Campaign 2', 'Campaign 3'],
            'Benjamin' => ['Campaign 1', 'Campaign 2','Campaign 3', 'Campaign 4'],
        ];

        foreach ($contacts as $name => $campaigns) {

            $contact = Contact::where('first_name', 'like', $name)->first();

            foreach ($campaigns as $campaign) {
                $campaign = Campaign::where('name', 'like', $campaign)->first();
                $contact->campaigns()->save($campaign);
            }
        }
    }
}
