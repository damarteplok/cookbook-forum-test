<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $channel1 = ['title' => 'Twice', 
        'slug' => str_slug('Twice')];
        $channel2 = ['title' => 'BlackPink',
    	'slug' => str_slug('BlackPink')];
        $channel3 = ['title' => 'Pristin',
    	'slug' => str_slug('Pristin')];
        $channel4 = ['title' => 'AOA',
    	'slug' => str_slug('AOA')];
        $channel5 = ['title' => 'GFriend',
    	'slug' => str_slug('GFriend')];
        $channel6 = ['title' => 'DIA',
    	'slug' => str_slug('DIA')];
        $channel7 = ['title' => 'Apink',
    	'slug' => str_slug('Apink')];
        $channel8 = ['title' => 'IU',
    	'slug' => str_slug('IU')];
        $channel9 = ['title' => 'EXID',
    	'slug' => str_slug('EXID')];

        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);
        App\Channel::create($channel5);
        App\Channel::create($channel6);
        App\Channel::create($channel7);
        App\Channel::create($channel8);
        App\Channel::create($channel9);
    }
}
