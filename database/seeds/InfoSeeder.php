<?php

use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            'id' => '1',
            'working_days' => '09:00 - 18:00',
            'holiday_days' => '09:00 - 15:00',
            'phone_one' => '+48 606 241 066',
            'phone_two' => '+48 (34) 325 15 79',
        ]);
    }
}
