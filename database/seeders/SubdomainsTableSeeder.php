<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubdomainsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subdomains')->truncate();
        
        \DB::table('subdomains')->insert(array (
            0 => 
            array (
                'id' => 1,
                'subdomain' => 'showtime',
                'url' => 'http://showtime.ejelenlet/',
                'name' => 'Showtime - Ejelenlet Developer Instance',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_showtime',
                'db_user' => 'ej2_showtime',
                'db_password' => 'bqNxN86xwatT68wv',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 0,
                'access_control_system' => 5,
                'last_export' => '2023-06-01 13:40:03',
                'created_at' => '2023-06-01 13:40:03',
                'updated_at' => '2023-06-29 13:49:37',
            ),
            1 => 
            array (
                'id' => 2,
                'subdomain' => 'teszt',
                'url' => 'http://teszt.ejelenlet/',
                'name' => 'TESZT',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_test',
                'db_user' => 'ej2_test',
                'db_password' => 'bueQZTEQaXbeXGTr',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 0,
                'access_control_system' => 0,
                'last_export' => '2023-06-16 13:22:04',
                'created_at' => '2023-06-16 13:22:04',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'subdomain' => 'da',
                'url' => 'http://da.ejelenlet/',
                'name' => 'Down Alapítvány',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_da_p',
                'db_user' => 'ej2_da_p',
                'db_password' => 'VQTTCmNHUB2uiKV',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 1,
                'access_control_system' => 0,
                'last_export' => '2023-06-16 13:22:04',
                'created_at' => '2023-06-16 13:22:04',
                'updated_at' => '2023-08-15 08:52:13',
            ),
            3 => 
            array (
                'id' => 4,
                'subdomain' => 'lgtoray',
                'url' => 'http://lgtoray.ejelenlet/',
                'name' => 'LG Toray Kft.',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_lgtoray',
                'db_user' => 'ej2_lgtoray',
                'db_password' => 'TCJpnkpTiO4H6F',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 0,
                'access_control_system' => 5,
                'last_export' => '2023-06-16 13:22:04',
                'created_at' => '2023-06-16 13:22:04',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'subdomain' => 'mars',
                'url' => 'http://mars.ejelenlet/',
                'name' => 'mars_p',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_mars',
                'db_user' => 'ej2_mars',
                'db_password' => 'kxIrLsI9Z9ly3Qbx',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 0,
                'access_control_system' => 5,
                'last_export' => '2023-06-16 13:22:04',
                'created_at' => '2023-06-16 13:22:04',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'subdomain' => 'llbghuber',
                'url' => 'http://llbghuber.ejelenlet/',
                'name' => 'Első Magyar Pékpont-rendszer Kft',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_llbghuber',
                'db_user' => 'ej2_llbghuber',
                'db_password' => 'r6nS3EkAx6TTkatQ',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 0,
                'access_control_system' => 5,
                'last_export' => '1000-01-01 00:00:00',
                'created_at' => '1000-01-01 00:00:00',
                'updated_at' => '1000-01-01 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'subdomain' => 'magyarepito',
                'url' => 'http://magyarepito.ejelenlet/',
                'name' => 'ej2_magyarepito_p',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_magyarepito_p',
                'db_user' => 'ej2_magyarepito_p',
                'db_password' => 'KU2tzHVWOAUL',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 0,
                'access_control_system' => 0,
                'last_export' => '2023-06-16 13:22:04',
                'created_at' => '2023-06-16 13:22:04',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'subdomain' => 'masped',
                'url' => 'http://masped.ejelenlet/',
                'name' => 'ej2_masped_p',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_masped_p',
                'db_user' => 'ej2_masped_p',
                'db_password' => 'O4WsDVKDgncwDju',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 0,
                'access_control_system' => 0,
                'last_export' => '2023-06-16 13:22:04',
                'created_at' => '2023-06-16 13:22:04',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'subdomain' => 'demo',
                'url' => 'http://demo.ejelenlet/',
                'name' => 'ej2_demo_p',
                'db_host' => 'localhost',
                'db_port' => 3306,
                'db_name' => 'ej2_demo_p',
                'db_user' => 'ej2_demo_p',
                'db_password' => '7aiOSAOoVXwIoKhh',
                'notification' => 1,
                'state_id' => 1,
                'is_mirror' => 0,
                'sso' => 0,
                'access_control_system' => 0,
                'last_export' => '2023-06-16 13:22:04',
                'created_at' => '2023-06-16 13:22:04',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));

        
    }
}