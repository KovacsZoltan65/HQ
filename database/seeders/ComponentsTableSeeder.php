<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('components')->truncate();
        
        \DB::table('components')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Központi komponens',
                'created_at' => '2023-06-23 00:00:00',
                'updated_at' => '2023-06-23 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Központi komponens',
                'created_at' => '2023-06-23 00:00:00',
                'updated_at' => '2023-06-23 00:00:00',
            ),
        ));

        
    }
}