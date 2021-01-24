<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => 'Jak szczepić niemowlaków?',
            'slug' => 'jak-szczepic-niemowlakow',
            'description' => 'to jest opis wpisu',
            'status'=> '1',
            'contents' => 'to jest treść wpisu',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
