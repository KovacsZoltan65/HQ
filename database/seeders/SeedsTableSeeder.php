<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeedsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seeds')->truncate();
        
        \DB::table('seeds')->insert(array (
            0 => 
            array (
                'id' => 1,
                'seed' => 'UserTableSeeder_2022_08_08_100001',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'seed' => 'SubdomainStateTableSeeder_2022_08_08_100002',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'seed' => 'RolesTableSeeder_2022_08_08_100003',
                'batch' => 1,
            ),
        ));

        
    }
}