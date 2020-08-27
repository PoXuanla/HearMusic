<?php

use Illuminate\Database\Seeder;

class MusicCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('music_category')->insert([
            ['name' => '搖滾'],
            ['name' => '民謠'],
            ['name' => '抒情'],
            ['name' => '古典'],
            ['name' => '饒舌'],
        ]);
    }
}
