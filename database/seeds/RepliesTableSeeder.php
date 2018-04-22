<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $r1 = [

        	'user_id' => 1,
        	'discussion_id' => 1,
        	'content' => 'Eu elit nostrud est sint laborum pariatur ut occaecat officia anim officia occaecat ut ad aliqua minim.'

        ];
        $r2 = [

        	'user_id' => 1,
        	'discussion_id' => 2,
        	'content' => 'Eu elit nostrud est sint laborum pariatur ut occaecat officia anim officia occaecat ut ad aliqua minim.'

        ];
        $r3 = [

        	'user_id' => 2,
        	'discussion_id' => 3,
        	'content' => 'Eu elit nostrud est sint laborum pariatur ut occaecat officia anim officia occaecat ut ad aliqua minim.'

        ];
        $r4 = [

        	'user_id' => 1,
        	'discussion_id' => 4,
        	'content' => 'Eu elit nostrud est sint laborum pariatur ut occaecat officia anim officia occaecat ut ad aliqua minim.'

        ];

        App\Reply::create($r1);
        App\Reply::create($r2);
        App\Reply::create($r3);
        App\Reply::create($r4);
    }
}
