<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class drugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drugs')->insert([

            [
            'name' => 'Amoxicillin 250mg',
            'unit_price' => 25.00
            ],

            [
            'name' => 'aracetamol 500mg',
            'unit_price' => 30.00
            ],


            [
            'name' => 'Fasenra 500mg',
            'unit_price' => 15.00
            ],

            [
            'name' => 'Baqsimi 50mg',
            'unit_price' => 45.00
            ],

            [
            'name' => 'Boniva 500mg',
            'unit_price' => 35.00
            ],
        ]
    );
    }
}
