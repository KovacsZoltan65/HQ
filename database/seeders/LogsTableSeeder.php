<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('logs')->truncate();
        
        \DB::table('logs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-01 14:32:06',
                'updated_at' => '2023-06-01 14:32:06',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-14 15:21:23',
                'updated_at' => '2023-06-14 15:21:23',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-15 08:37:03',
                'updated_at' => '2023-06-15 08:37:03',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'subdomain_id' => 1,
                'level' => 1,
                'what' => 'Felhasználó létrehozása',
                'with' => 'a:3:{s:4:"name";s:15:"Kovács Zoltán";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:4:"role";s:1:"1";}',
                'created_at' => '2023-06-15 08:39:12',
                'updated_at' => '2023-06-15 08:39:12',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-15 08:39:30',
                'updated_at' => '2023-06-15 08:39:30',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Jelszó módosítás',
                'with' => 'nincs adat',
                'created_at' => '2023-06-15 08:40:30',
                'updated_at' => '2023-06-15 08:40:30',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-15 08:40:48',
                'updated_at' => '2023-06-15 08:40:48',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-16 08:33:31',
                'updated_at' => '2023-06-16 08:33:31',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-16 08:57:34',
                'updated_at' => '2023-06-16 08:57:34',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-16 10:34:21',
                'updated_at' => '2023-06-16 10:34:21',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-16 13:00:03',
                'updated_at' => '2023-06-16 13:00:03',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-19 06:41:59',
                'updated_at' => '2023-06-19 06:41:59',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 1,
                'subdomain_id' => 1,
                'level' => 1,
                'what' => 'Példány adatainak szerkesztése',
                'with' => 'a:12:{s:11:"subdomainId";s:1:"1";s:4:"name";s:39:"Showtime - Ejelenlet Developer Instance";s:9:"subdomain";s:8:"showtime";s:7:"db_name";s:12:"ej2_showtime";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:12:"ej2_showtime";s:11:"db_p',
                'created_at' => '2023-06-19 06:42:40',
                'updated_at' => '2023-06-19 06:42:40',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-19 08:53:23',
                'updated_at' => '2023-06-19 08:53:23',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 1,
                'subdomain_id' => 1,
                'level' => 1,
                'what' => 'Példány adatainak szerkesztése',
                'with' => 'a:12:{s:11:"subdomainId";s:1:"1";s:4:"name";s:39:"Showtime - Ejelenlet Developer Instance";s:9:"subdomain";s:8:"showtime";s:7:"db_name";s:12:"ej2_showtime";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:12:"ej2_showtime";s:11:"db_p',
                'created_at' => '2023-06-19 08:53:39',
                'updated_at' => '2023-06-19 08:53:39',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-20 14:34:47',
                'updated_at' => '2023-06-20 14:34:47',
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-20 14:52:01',
                'updated_at' => '2023-06-20 14:52:01',
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-21 09:19:21',
                'updated_at' => '2023-06-21 09:19:21',
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-21 09:29:19',
                'updated_at' => '2023-06-21 09:29:19',
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-21 13:09:45',
                'updated_at' => '2023-06-21 13:09:45',
            ),
            20 => 
            array (
                'id' => 21,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-22 13:36:11',
                'updated_at' => '2023-06-22 13:36:11',
            ),
            21 => 
            array (
                'id' => 22,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-22 14:30:23',
                'updated_at' => '2023-06-22 14:30:23',
            ),
            22 => 
            array (
                'id' => 23,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-22 14:33:58',
                'updated_at' => '2023-06-22 14:33:58',
            ),
            23 => 
            array (
                'id' => 24,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-22 14:37:15',
                'updated_at' => '2023-06-22 14:37:15',
            ),
            24 => 
            array (
                'id' => 25,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-23 07:13:17',
                'updated_at' => '2023-06-23 07:13:17',
            ),
            25 => 
            array (
                'id' => 26,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-06-28 12:45:01',
                'updated_at' => '2023-06-28 12:45:01',
            ),
            26 => 
            array (
                'id' => 27,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-28 14:21:55',
                'updated_at' => '2023-06-28 14:21:55',
            ),
            27 => 
            array (
                'id' => 28,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-29 13:49:11',
                'updated_at' => '2023-06-29 13:49:11',
            ),
            28 => 
            array (
                'id' => 29,
                'user_id' => 4,
                'subdomain_id' => 1,
                'level' => 1,
                'what' => 'Példány adatainak szerkesztése',
                'with' => 'a:12:{s:11:"subdomainId";s:1:"1";s:4:"name";s:39:"Showtime - Ejelenlet Developer Instance";s:9:"subdomain";s:8:"showtime";s:7:"db_name";s:12:"ej2_showtime";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:12:"ej2_showtime";s:11:"db_p',
                'created_at' => '2023-06-29 13:49:37',
                'updated_at' => '2023-06-29 13:49:37',
            ),
            29 => 
            array (
                'id' => 30,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-06-30 07:23:15',
                'updated_at' => '2023-06-30 07:23:15',
            ),
            30 => 
            array (
                'id' => 31,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-07-07 10:19:56',
                'updated_at' => '2023-07-07 10:19:56',
            ),
            31 => 
            array (
                'id' => 32,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-07-07 10:23:04',
                'updated_at' => '2023-07-07 10:23:04',
            ),
            32 => 
            array (
                'id' => 33,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-10 08:21:08',
                'updated_at' => '2023-07-10 08:21:08',
            ),
            33 => 
            array (
                'id' => 34,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-10 10:24:10',
                'updated_at' => '2023-07-10 10:24:10',
            ),
            34 => 
            array (
                'id' => 35,
                'user_id' => 1,
                'subdomain_id' => 4,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-10 10:52:17',
                'updated_at' => '2023-07-10 10:52:17',
            ),
            35 => 
            array (
                'id' => 36,
                'user_id' => 1,
                'subdomain_id' => 4,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-10 10:54:09',
                'updated_at' => '2023-07-10 10:54:09',
            ),
            36 => 
            array (
                'id' => 37,
                'user_id' => 1,
                'subdomain_id' => 4,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-10 10:55:14',
                'updated_at' => '2023-07-10 10:55:14',
            ),
            37 => 
            array (
                'id' => 38,
                'user_id' => 4,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'kovacs.zoltan@softc.hu',
                'created_at' => '2023-07-10 12:41:59',
                'updated_at' => '2023-07-10 12:41:59',
            ),
            38 => 
            array (
                'id' => 39,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-11 06:51:52',
                'updated_at' => '2023-07-11 06:51:52',
            ),
            39 => 
            array (
                'id' => 40,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-12 06:59:39',
                'updated_at' => '2023-07-12 06:59:39',
            ),
            40 => 
            array (
                'id' => 41,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-12 14:46:07',
                'updated_at' => '2023-07-12 14:46:07',
            ),
            41 => 
            array (
                'id' => 42,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-13 07:02:42',
                'updated_at' => '2023-07-13 07:02:42',
            ),
            42 => 
            array (
                'id' => 43,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-13 08:57:12',
                'updated_at' => '2023-07-13 08:57:12',
            ),
            43 => 
            array (
                'id' => 44,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-13 14:23:12',
                'updated_at' => '2023-07-13 14:23:12',
            ),
            44 => 
            array (
                'id' => 45,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-14 07:07:04',
                'updated_at' => '2023-07-14 07:07:04',
            ),
            45 => 
            array (
                'id' => 46,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-17 07:45:20',
                'updated_at' => '2023-07-17 07:45:20',
            ),
            46 => 
            array (
                'id' => 47,
                'user_id' => 1,
                'subdomain_id' => 3,
                'level' => 1,
                'what' => 'Virtuális admin létrehozása',
                'with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:670;s:22:"core_legal_entities_id";i:731;}',
                'created_at' => '2023-07-17 09:35:25',
                'updated_at' => '2023-07-17 09:35:25',
            ),
            47 => 
            array (
                'id' => 48,
                'user_id' => 1,
                'subdomain_id' => 4,
                'level' => 1,
                'what' => 'Virtuális admin létrehozása',
                'with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:268;s:22:"core_legal_entities_id";i:268;}',
                'created_at' => '2023-07-17 10:05:01',
                'updated_at' => '2023-07-17 10:05:01',
            ),
            48 => 
            array (
                'id' => 49,
                'user_id' => 1,
                'subdomain_id' => 5,
                'level' => 1,
                'what' => 'Virtuális admin létrehozása',
                'with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:269;s:22:"core_legal_entities_id";i:269;}',
                'created_at' => '2023-07-17 10:05:54',
                'updated_at' => '2023-07-17 10:05:54',
            ),
            49 => 
            array (
                'id' => 50,
                'user_id' => 1,
                'subdomain_id' => 1,
                'level' => 1,
                'what' => 'Virtuális admin létrehozása',
                'with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:73;s:22:"core_legal_entities_id";i:73;}',
                'created_at' => '2023-07-17 12:19:00',
                'updated_at' => '2023-07-17 12:19:00',
            ),
            50 => 
            array (
                'id' => 51,
                'user_id' => 1,
                'subdomain_id' => 2,
                'level' => 1,
                'what' => 'Virtuális admin létrehozása',
                'with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:994;s:22:"core_legal_entities_id";i:1027;}',
                'created_at' => '2023-07-17 12:32:28',
                'updated_at' => '2023-07-17 12:32:28',
            ),
            51 => 
            array (
                'id' => 52,
                'user_id' => 1,
                'subdomain_id' => 2,
                'level' => 1,
                'what' => 'Virtuális admin létrehozása',
                'with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:995;s:22:"core_legal_entities_id";i:1028;}',
                'created_at' => '2023-07-17 12:59:15',
                'updated_at' => '2023-07-17 12:59:15',
            ),
            52 => 
            array (
                'id' => 53,
                'user_id' => 1,
                'subdomain_id' => 3,
                'level' => 1,
                'what' => 'Virtuális admin létrehozása',
                'with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:671;s:22:"core_legal_entities_id";i:732;}',
                'created_at' => '2023-07-17 13:07:37',
                'updated_at' => '2023-07-17 13:07:37',
            ),
            53 => 
            array (
                'id' => 54,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-18 08:18:06',
                'updated_at' => '2023-07-18 08:18:06',
            ),
            54 => 
            array (
                'id' => 55,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-19 09:05:42',
                'updated_at' => '2023-07-19 09:05:42',
            ),
            55 => 
            array (
                'id' => 56,
                'user_id' => 1,
                'subdomain_id' => 3,
                'level' => 1,
                'what' => 'Cég létrehozása',
                'with' => 'Cég 2',
                'created_at' => '2023-07-19 09:45:02',
                'updated_at' => '2023-07-19 09:45:02',
            ),
            56 => 
            array (
                'id' => 57,
                'user_id' => 1,
                'subdomain_id' => 3,
                'level' => 1,
                'what' => 'Külsős admin létrehozása',
                'with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:10:"Nagy Béla";s:8:"language";s:1:"1";s:5:"email";s:16:"nagy.bela@ceg.hu";s:14:"core_person_id";i:672;s:22:"core_legal_entities_id";i:733;}',
                'created_at' => '2023-07-19 09:46:20',
                'updated_at' => '2023-07-19 09:46:20',
            ),
            57 => 
            array (
                'id' => 58,
                'user_id' => 1,
                'subdomain_id' => 3,
                'level' => 1,
                'what' => 'Külsős admin létrehozása',
                'with' => 'a:3:{s:6:"firmId";s:1:"2";s:14:"core_person_id";s:3:"672";s:22:"core_legal_entities_id";i:734;}',
                'created_at' => '2023-07-19 09:47:24',
                'updated_at' => '2023-07-19 09:47:24',
            ),
            58 => 
            array (
                'id' => 59,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-19 11:35:21',
                'updated_at' => '2023-07-19 11:35:21',
            ),
            59 => 
            array (
                'id' => 60,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-20 09:09:23',
                'updated_at' => '2023-07-20 09:09:23',
            ),
            60 => 
            array (
                'id' => 61,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-21 07:16:29',
                'updated_at' => '2023-07-21 07:16:29',
            ),
            61 => 
            array (
                'id' => 62,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-24 08:57:16',
                'updated_at' => '2023-07-24 08:57:16',
            ),
            62 => 
            array (
                'id' => 63,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-25 08:18:33',
                'updated_at' => '2023-07-25 08:18:33',
            ),
            63 => 
            array (
                'id' => 64,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-26 08:28:15',
                'updated_at' => '2023-07-26 08:28:15',
            ),
            64 => 
            array (
                'id' => 65,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-26 13:16:37',
                'updated_at' => '2023-07-26 13:16:37',
            ),
            65 => 
            array (
                'id' => 66,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-27 08:16:57',
                'updated_at' => '2023-07-27 08:16:57',
            ),
            66 => 
            array (
                'id' => 67,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-27 12:25:42',
                'updated_at' => '2023-07-27 12:25:42',
            ),
            67 => 
            array (
                'id' => 68,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-07-27 12:33:06',
                'updated_at' => '2023-07-27 12:33:06',
            ),
            68 => 
            array (
                'id' => 69,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-08-01 11:40:53',
                'updated_at' => '2023-08-01 11:40:53',
            ),
            69 => 
            array (
                'id' => 70,
                'user_id' => 1,
                'subdomain_id' => 5,
                'level' => 1,
                'what' => 'Példány adatainak szerkesztése',
                'with' => 'a:12:{s:11:"subdomainId";s:1:"5";s:4:"name";s:6:"mars_p";s:9:"subdomain";s:4:"mars";s:7:"db_name";s:8:"ej2_mars";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:8:"ej2_mars";s:11:"db_password";s:16:"kxIrLsI9Z9ly3Qbx";s:5:"state";s:1',
                'created_at' => '2023-08-01 12:08:50',
                'updated_at' => '2023-08-01 12:08:50',
            ),
            70 => 
            array (
                'id' => 71,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-08-02 09:27:21',
                'updated_at' => '2023-08-02 09:27:21',
            ),
            71 => 
            array (
                'id' => 72,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-08-04 13:58:17',
                'updated_at' => '2023-08-04 13:58:17',
            ),
            72 => 
            array (
                'id' => 73,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-08-07 08:27:14',
                'updated_at' => '2023-08-07 08:27:14',
            ),
            73 => 
            array (
                'id' => 74,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-08-08 09:15:36',
                'updated_at' => '2023-08-08 09:15:36',
            ),
            74 => 
            array (
                'id' => 75,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-08-09 08:19:29',
                'updated_at' => '2023-08-09 08:19:29',
            ),
            75 => 
            array (
                'id' => 76,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-08-15 08:51:47',
                'updated_at' => '2023-08-15 08:51:47',
            ),
            76 => 
            array (
                'id' => 77,
                'user_id' => 1,
                'subdomain_id' => 3,
                'level' => 1,
                'what' => 'Példány adatainak szerkesztése',
                'with' => 'a:12:{s:11:"subdomainId";s:1:"3";s:4:"name";s:17:"Down Alapítvány";s:9:"subdomain";s:2:"da";s:7:"db_name";s:8:"ej2_da_p";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:8:"ej2_da_p";s:11:"db_password";s:15:"VQTTCmNHUB2uiKV";s:5:"sta',
                'created_at' => '2023-08-15 08:52:13',
                'updated_at' => '2023-08-15 08:52:13',
            ),
            77 => 
            array (
                'id' => 78,
                'user_id' => 1,
                'subdomain_id' => 3,
                'level' => 1,
                'what' => 'SSO kliens létrehozása',
                'with' => 'client_name: SSO Down',
                'created_at' => '2023-08-15 08:55:42',
                'updated_at' => '2023-08-15 08:55:42',
            ),
            78 => 
            array (
                'id' => 79,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-08-15 14:52:03',
                'updated_at' => '2023-08-15 14:52:03',
            ),
            79 => 
            array (
                'id' => 80,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-09-04 10:43:35',
                'updated_at' => '2023-09-04 10:43:35',
            ),
            80 => 
            array (
                'id' => 81,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-09-04 11:41:01',
                'updated_at' => '2023-09-04 11:41:01',
            ),
            81 => 
            array (
                'id' => 82,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-09-08 07:58:08',
                'updated_at' => '2023-09-08 07:58:08',
            ),
            82 => 
            array (
                'id' => 83,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-09-11 09:46:46',
                'updated_at' => '2023-09-11 09:46:46',
            ),
            83 => 
            array (
                'id' => 84,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-09-12 13:32:48',
                'updated_at' => '2023-09-12 13:32:48',
            ),
            84 => 
            array (
                'id' => 85,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-09-13 08:41:51',
                'updated_at' => '2023-09-13 08:41:51',
            ),
            85 => 
            array (
                'id' => 86,
                'user_id' => 1,
                'subdomain_id' => 0,
                'level' => 1,
                'what' => 'Belépés a központba',
                'with' => 'ejadmin@softc.hu',
                'created_at' => '2023-09-15 09:29:43',
                'updated_at' => '2023-09-15 09:29:43',
            ),
        ));

        
    }
}