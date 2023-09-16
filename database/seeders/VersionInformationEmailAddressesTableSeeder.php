<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VersionInformationEmailAddressesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('version_information_email_addresses')->truncate();
        
        \DB::table('version_information_email_addresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ronkai György',
                'email' => 'ejadmin_rgy@softc.hu',
                'subdomain' => '{"0":"showtime"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Szipli Viktória',
                'email' => 'ejadmin_szv@softc.hu',
                'subdomain' => '{"0":"showtime"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Nándori Zsuzsa',
                'email' => 'ejadmin_nzs@softc.hu',
                'subdomain' => '{"0":"showtime","1":"teszt"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 2,
                'send_email' => 1,
                'active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Tanka Veronika',
                'email' => 'ejadmin_tv@softc.hu',
                'subdomain' => '{"0":"showtime","1":"teszt","2":"da","3":"lgtoray","4":"mars"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 5,
                'send_email' => 1,
                'active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Varga Viktor',
                'email' => 'ejadmin_vv@softc.hu',
                'subdomain' => '{"0":"showtime"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Zsák Tünde',
                'email' => 'ejadmin_zst@softc.hu',
                'subdomain' => '{"0":"showtime","1":"teszt","2":"da","3":"lgtoray","4":"mars"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 5,
                'send_email' => 1,
                'active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Rick Ágnes',
                'email' => 'ejadmin_ra@softc.hu',
                'subdomain' => '{"0":"showtime","1":"teszt","2":"da","3":"lgtoray","4":"mars"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 5,
                'send_email' => 1,
                'active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Kovács Zoltán',
                'email' => 'kovacs.zoltan@softc.hu',
                'subdomain' => '{"0":"showtime","1":"teszt","2":"da","3":"lgtoray","4":"mars"}',
                'external_admin' => 0,
                'internal_admin' => 0,
                'papik' => 1,
                'valid_counter' => 5,
                'send_email' => 1,
                'active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Szabadi Mónika',
                'email' => 'monika.szabadi@inter.ikea.com',
                'subdomain' => '{"0":"teszt"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Papp András',
                'email' => 'andras.papp@inter.ikea.com',
                'subdomain' => '{"0":"teszt"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Horváth Szilvia',
                'email' => 'szilvia.horvath@inter.ikea.com',
                'subdomain' => '{"0":"teszt"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Márton Attila',
                'email' => 'attila.marton@inter.ikea.com',
                'subdomain' => '{"0":"teszt"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Varga Noémi',
                'email' => 'noemi.varga@inter.ikea.com',
                'subdomain' => '{"0":"teszt"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Baczoniné Lukács Xénia',
                'email' => 'xenia.baczonine.lukacs@inter.ikea.com',
                'subdomain' => '{"0":"teszt"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Nándori Zsuzsa',
                'email' => 'nandori.zsuzsa@softc.hu',
                'subdomain' => '{"0":"teszt"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Szabó Ákos',
                'email' => 'szaboakos@downalapitvany.hu',
                'subdomain' => '{"0":"da"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Gerecze-Szalay Paula Mariann',
                'email' => 'gereczepaula@downalapitvany.hu',
                'subdomain' => '{"0":"da"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Dr. Gruiz Katalin',
                'email' => 'gruiz@downalapitvany.hu',
                'subdomain' => '{"0":"da"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Szaszák Tibor',
                'email' => 'tibor.szaszak@gmail.com',
                'subdomain' => '{"0":"da"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Dulcz Adrienn',
                'email' => 'dulczadrien@gmail.com',
                'subdomain' => '{"0":"da"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 1,
                'send_email' => 1,
                'active' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Nagy Béla',
                'email' => 'nagy.bela@ceg.hu',
                'subdomain' => '{"0":"da"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 2,
                'send_email' => 1,
                'active' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Molnár Mónika',
                'email' => 'monika.molnar.s3@mail.toray',
                'subdomain' => '{"0":"lgtoray","1":"mars"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 2,
                'send_email' => 1,
                'active' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Melecsky Réka',
                'email' => 'reka.melecsky.v4@mail.toray',
                'subdomain' => '{"0":"lgtoray","1":"mars"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 2,
                'send_email' => 1,
                'active' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Kersánszki-Scheller Tímea',
                'email' => 'timea.kersanszki-scheller.q7@mail.toray',
                'subdomain' => '{"0":"lgtoray","1":"mars"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 2,
                'send_email' => 1,
                'active' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Katona Krisztián',
                'email' => 'krisztian.katona.f6@mail.toray',
                'subdomain' => '{"0":"lgtoray","1":"mars"}',
                'external_admin' => 0,
                'internal_admin' => 1,
                'papik' => 0,
                'valid_counter' => 2,
                'send_email' => 1,
                'active' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'LG Toray Admin',
                'email' => 'hr.thu.ug@mail.toray',
                'subdomain' => '{"0":"lgtoray","1":"mars"}',
                'external_admin' => 1,
                'internal_admin' => 0,
                'papik' => 0,
                'valid_counter' => 2,
                'send_email' => 1,
                'active' => 1,
            ),
        ));

        
    }
}