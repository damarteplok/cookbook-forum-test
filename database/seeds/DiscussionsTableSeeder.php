<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $t1 = 'How tall is tzuyu twice';
        $t2 = 'Jisoo blackpink poong poong?';
        $t3 = 'Jisoo the real maknae in blackpink xaxa';
        $t4 = 'Xiyeon pristin underated star';

        $d1 = [

        	'title' => $t1,
        	'content' => 'Ea voluptate in qui quis id ut enim fugiat irure non veniam. Ut id ex nisi dolor culpa excepteur sunt quis ex tempor occaecat cupidatat ut. Anim enim occaecat tempor ut ullamco in non nisi sed.',
        	'channel_id' => 1,
        	'user_id' => 2,
        	'slug' => str_slug($t1)

        ];
        $d2 = [

        	'title' => $t2,
        	'content' => 'Ea voluptate in qui quis id ut enim fugiat irure non veniam. Ut id ex nisi dolor culpa excepteur sunt quis ex tempor occaecat cupidatat ut. Anim enim occaecat tempor ut ullamco in non nisi sed.',
        	'channel_id' => 2,
        	'user_id' => 1,
        	'slug' => str_slug($t2)

        ];
        $d3 = [

        	'title' => $t3,
        	'content' => 'Ea voluptate in qui quis id ut enim fugiat irure non veniam. Ut id ex nisi dolor culpa excepteur sunt quis ex tempor occaecat cupidatat ut. Anim enim occaecat tempor ut ullamco in non nisi sed.',
        	'channel_id' => 2,
        	'user_id' => 1,
        	'slug' => str_slug($t3)

        ];
        $d4 = [

        	'title' => $t4,
        	'content' => 'Ea voluptate in qui quis id ut enim fugiat irure non veniam. Ut id ex nisi dolor culpa excepteur sunt quis ex tempor occaecat cupidatat ut. Anim enim occaecat tempor ut ullamco in non nisi sed.',
        	'channel_id' => 3,
        	'user_id' => 2,
        	'slug' => str_slug($t4)

        ];

        App\Discussion::create($d1);
        App\Discussion::create($d2);
        App\Discussion::create($d3);
        App\Discussion::create($d4);
    }
}
