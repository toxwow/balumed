<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Pediatria',
            'slug' => 'pediatria',
            'pageTitleService' => '',
            'metaDescriptionService' => '',
            'intro' => 'krotki opis',
            'description' => 'Szczególną grupą pacjentów są noworodki urodzone przedwcześnie, z małą masą ciała i innymi problemami zdrowotnymi, które wymagają specjalistycznej opieki medycznej. Najczęstszym problemem okresu noworodkowego, niejednokrotnie wymagającym powtórnej hospitalizacji jest żółtaczka. Nasza placówka oferuje kompleksową pomoc, od bezinwazyjnych, przezskórnych pomiarów poziomu bilirubiny do prowadzenia leczenia w warunkach domowych.',
            'status'=> '0',
            'icon' => '',
        ]);
    }
}
