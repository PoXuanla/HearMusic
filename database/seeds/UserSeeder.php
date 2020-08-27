<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'xuan',
                'account' => 'xuan',
                'email' => 'wdftmmas234@gmail.com',
                'password' => Hash::make('11111111'),
            ],

        ]);
    }
}
