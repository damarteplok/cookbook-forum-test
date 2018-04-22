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
        $channel1 = ['title' => 'Twice'];
        $channel2 = ['title' => 'BlackPink'];
        $channel3 = ['title' => 'Pristin'];
        $channel4 = ['title' => 'AOA'];
        $channel5 = ['title' => 'GFriend'];
        $channel6 = ['title' => 'DIA'];
        $channel7 = ['title' => 'Apink'];
        $channel8 = ['title' => 'IU'];
        $channel9 = ['title' => 'EXID'];

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
