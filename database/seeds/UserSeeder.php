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
                'name' => 'xuan111',
                'account' => 'xuan',
                'email' => 'wdftmmas234@gmail.com',
                'password' => Hash::make('11111111'),
            ],
            [
                'name' => '222222',
                'account' => '111111',
                'email' => 'wdftmmas234@gmail.com',
                'password' => Hash::make('11111111'),
            ],
            [
                'name' => '222222',
                'account' => '222222',
                'email' => 'wdftmmas234@gmail.com',
                'password' => Hash::make('11111111'),
            ],

        ]);
    }
}
