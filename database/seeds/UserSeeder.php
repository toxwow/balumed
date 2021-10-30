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
        DB::table('users')->insert([
            'name' => 'Tomasz Tomżyński',
            'email' => 'admin',
            'password' => Hash::make('Mistrz1234!'),
        ]);

        DB::table('users')->insert([
            'name' => 'Łukasz Najman',
            'email' => 'najman',
            'password' => Hash::make('Corola66'),
        ]);
    }
}
