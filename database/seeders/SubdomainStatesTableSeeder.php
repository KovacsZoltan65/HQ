<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubdomainStatesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subdomain_states')->truncate();
        
        \DB::table('subdomain_states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aktív',
                'created_at' => '2023-06-01 13:36:38',
                'updated_at' => '2023-06-01 13:36:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Felfüggesztve',
                'created_at' => '2023-06-01 13:36:38',
                'updated_at' => '2023-06-01 13:36:38',
            ),
            2 => 
            array (
                'id' => 3,
            'name' => 'Leállítva(HQ)',
                'created_at' => '2023-06-01 13:36:38',
                'updated_at' => '2023-06-01 13:36:38',
            ),
            3 => 
            array (
                'id' => 4,
            'name' => 'Leállítva(példány)',
                'created_at' => '2023-06-01 13:36:38',
                'updated_at' => '2023-06-01 13:36:38',
            ),
        ));

        
    }
}