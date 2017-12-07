<?php

use Illuminate\Database\Seeder;
use App\Campaign;

class CampaignsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $campaigns = [
            ['Campaign 1', 'Subject 1', 'Title 1', 'Message 1'],
            ['Campaign 1', 'Subject 2', 'Title 2', 'Message 2'],
            ['Campaign 1', 'Subject 3', 'Title 3', 'Message 3'],
            ['Campaign 1', 'Subject 4', 'Title 4', 'Message 4'],
        ];

        $count = count($campaigns);

        foreach ($campaigns as $key => $campaign) {
            Campaign::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count - 1)->toDateTimeString(),
                'name' => $campaign[0],
                'subject' => $campaign[1],
                'title' => $campaign[2],
                'content' => $campaign[3],
            ]);
            $count--;
        }
    }
}
