<?php

namespace Database\Seeders;

use App\Models\Log;
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
        
        $arr_logs = [
            ['id' => 1,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-01 14:32:06','updated_at' => '2023-06-01 14:32:06',],
            ['id' => 2,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-14 15:21:23','updated_at' => '2023-06-14 15:21:23',],
            ['id' => 3,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-15 08:37:03','updated_at' => '2023-06-15 08:37:03',],
            ['id' => 4,'user_id' => 1,'subdomain_id' => 1,'level' => 1,'what' => 'Felhasználó létrehozása','with' => 'a:3:{s:4:"name";s:15:"Kovács Zoltán";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:4:"role";s:1:"1";}','created_at' => '2023-06-15 08:39:12','updated_at' => '2023-06-15 08:39:12',],
            ['id' => 5,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-15 08:39:30','updated_at' => '2023-06-15 08:39:30',],
            ['id' => 6,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Jelszó módosítás','with' => 'nincs adat','created_at' => '2023-06-15 08:40:30','updated_at' => '2023-06-15 08:40:30',],
            ['id' => 7,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-15 08:40:48','updated_at' => '2023-06-15 08:40:48',],
            ['id' => 8,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-16 08:33:31','updated_at' => '2023-06-16 08:33:31',],
            ['id' => 9,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-16 08:57:34','updated_at' => '2023-06-16 08:57:34',],
            ['id' => 10,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-16 10:34:21','updated_at' => '2023-06-16 10:34:21',],
            ['id' => 11,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-16 13:00:03','updated_at' => '2023-06-16 13:00:03',],
            ['id' => 12,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-19 06:41:59','updated_at' => '2023-06-19 06:41:59',],
            ['id' => 13,'user_id' => 1,'subdomain_id' => 1,'level' => 1,'what' => 'Példány adatainak szerkesztése','with' => 'a:12:{s:11:"subdomainId";s:1:"1";s:4:"name";s:39:"Showtime - Ejelenlet Developer Instance";s:9:"subdomain";s:8:"showtime";s:7:"db_name";s:12:"ej2_showtime";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:12:"ej2_showtime";s:11:"db_p','created_at' => '2023-06-19 06:42:40','updated_at' => '2023-06-19 06:42:40',],
            ['id' => 14,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-19 08:53:23','updated_at' => '2023-06-19 08:53:23',],
            ['id' => 15,'user_id' => 1,'subdomain_id' => 1,'level' => 1,'what' => 'Példány adatainak szerkesztése','with' => 'a:12:{s:11:"subdomainId";s:1:"1";s:4:"name";s:39:"Showtime - Ejelenlet Developer Instance";s:9:"subdomain";s:8:"showtime";s:7:"db_name";s:12:"ej2_showtime";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:12:"ej2_showtime";s:11:"db_p','created_at' => '2023-06-19 08:53:39','updated_at' => '2023-06-19 08:53:39',],
            ['id' => 16,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-20 14:34:47','updated_at' => '2023-06-20 14:34:47',],
            ['id' => 17,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-20 14:52:01','updated_at' => '2023-06-20 14:52:01',],
            ['id' => 18,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-21 09:19:21','updated_at' => '2023-06-21 09:19:21',],
            ['id' => 19,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-21 09:29:19','updated_at' => '2023-06-21 09:29:19',],
            ['id' => 20,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-21 13:09:45','updated_at' => '2023-06-21 13:09:45',],
            ['id' => 21,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-22 13:36:11','updated_at' => '2023-06-22 13:36:11',],
            ['id' => 22,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-22 14:30:23','updated_at' => '2023-06-22 14:30:23',],
            ['id' => 23,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-22 14:33:58','updated_at' => '2023-06-22 14:33:58',],
            ['id' => 24,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-22 14:37:15','updated_at' => '2023-06-22 14:37:15',],
            ['id' => 25,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-23 07:13:17','updated_at' => '2023-06-23 07:13:17',],
            ['id' => 26,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-06-28 12:45:01','updated_at' => '2023-06-28 12:45:01',],
            ['id' => 27,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-28 14:21:55','updated_at' => '2023-06-28 14:21:55',],
            ['id' => 28,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-29 13:49:11','updated_at' => '2023-06-29 13:49:11',],
            ['id' => 29,'user_id' => 4,'subdomain_id' => 1,'level' => 1,'what' => 'Példány adatainak szerkesztése','with' => 'a:12:{s:11:"subdomainId";s:1:"1";s:4:"name";s:39:"Showtime - Ejelenlet Developer Instance";s:9:"subdomain";s:8:"showtime";s:7:"db_name";s:12:"ej2_showtime";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:12:"ej2_showtime";s:11:"db_p','created_at' => '2023-06-29 13:49:37','updated_at' => '2023-06-29 13:49:37',],
            ['id' => 30,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-06-30 07:23:15','updated_at' => '2023-06-30 07:23:15',],
            ['id' => 31,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-07-07 10:19:56','updated_at' => '2023-07-07 10:19:56',],
            ['id' => 32,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-07-07 10:23:04','updated_at' => '2023-07-07 10:23:04',],
            ['id' => 33,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-10 08:21:08','updated_at' => '2023-07-10 08:21:08',],
            ['id' => 34,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-10 10:24:10','updated_at' => '2023-07-10 10:24:10',],
            ['id' => 35,'user_id' => 1,'subdomain_id' => 4,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-10 10:52:17','updated_at' => '2023-07-10 10:52:17',],
            ['id' => 36,'user_id' => 1,'subdomain_id' => 4,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-10 10:54:09','updated_at' => '2023-07-10 10:54:09',],
            ['id' => 37,'user_id' => 1,'subdomain_id' => 4,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-10 10:55:14','updated_at' => '2023-07-10 10:55:14',],
            ['id' => 38,'user_id' => 4,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'kovacs.zoltan@softc.hu','created_at' => '2023-07-10 12:41:59','updated_at' => '2023-07-10 12:41:59',],
            ['id' => 39,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-11 06:51:52','updated_at' => '2023-07-11 06:51:52',],
            ['id' => 40,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-12 06:59:39','updated_at' => '2023-07-12 06:59:39',],
            ['id' => 41,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-12 14:46:07','updated_at' => '2023-07-12 14:46:07',],
            ['id' => 42,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-13 07:02:42','updated_at' => '2023-07-13 07:02:42',],
            ['id' => 43,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-13 08:57:12','updated_at' => '2023-07-13 08:57:12',],
            ['id' => 44,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-13 14:23:12','updated_at' => '2023-07-13 14:23:12',],
            ['id' => 45,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-14 07:07:04','updated_at' => '2023-07-14 07:07:04',],
            ['id' => 46,'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-17 07:45:20','updated_at' => '2023-07-17 07:45:20',],
            ['id' => 47,'user_id' => 1,'subdomain_id' => 3,'level' => 1,'what' => 'Virtuális admin létrehozása','with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:670;s:22:"core_legal_entities_id";i:731;}','created_at' => '2023-07-17 09:35:25','updated_at' => '2023-07-17 09:35:25',],
            ['id' => 48,'user_id' => 1,'subdomain_id' => 4,'level' => 1,'what' => 'Virtuális admin létrehozása','with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:268;s:22:"core_legal_entities_id";i:268;}','created_at' => '2023-07-17 10:05:01','updated_at' => '2023-07-17 10:05:01',],
            ['id' => 49,'user_id' => 1,'subdomain_id' => 5,'level' => 1,'what' => 'Virtuális admin létrehozása','with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:269;s:22:"core_legal_entities_id";i:269;}','created_at' => '2023-07-17 10:05:54','updated_at' => '2023-07-17 10:05:54',],
            ['id' => 50,'user_id' => 1,'subdomain_id' => 1,'level' => 1,'what' => 'Virtuális admin létrehozása','with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:73;s:22:"core_legal_entities_id";i:73;}','created_at' => '2023-07-17 12:19:00','updated_at' => '2023-07-17 12:19:00',],
            ['id' => 51,'user_id' => 1,'subdomain_id' => 2,'level' => 1,'what' => 'Virtuális admin létrehozása','with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:994;s:22:"core_legal_entities_id";i:1027;}','created_at' => '2023-07-17 12:32:28','updated_at' => '2023-07-17 12:32:28',],
            ['id' => 52,'user_id' => 1,'subdomain_id' => 2,'level' => 1,'what' => 'Virtuális admin létrehozása','with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:995;s:22:"core_legal_entities_id";i:1028;}','created_at' => '2023-07-17 12:59:15','updated_at' => '2023-07-17 12:59:15',],
            ['id' => 53,'user_id' => 1,'subdomain_id' => 3,'level' => 1,'what' => 'Virtuális admin létrehozása','with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:15:"Kovács Zoltán";s:8:"language";s:1:"1";s:5:"email";s:22:"kovacs.zoltan@softc.hu";s:14:"core_person_id";i:671;s:22:"core_legal_entities_id";i:732;}','created_at' => '2023-07-17 13:07:37','updated_at' => '2023-07-17 13:07:37',],
            ['id' => 54, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-18 08:18:06','updated_at' => '2023-07-18 08:18:06',],
            ['id' => 55, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-19 09:05:42','updated_at' => '2023-07-19 09:05:42',],
            ['id' => 56, 'user_id' => 1,'subdomain_id' => 3,'level' => 1,'what' => 'Cég létrehozása','with' => 'Cég 2','created_at' => '2023-07-19 09:45:02','updated_at' => '2023-07-19 09:45:02',],
            ['id' => 57, 'user_id' => 1,'subdomain_id' => 3,'level' => 1,'what' => 'Külsős admin létrehozása','with' => 'a:6:{s:6:"firmId";s:1:"1";s:4:"name";s:10:"Nagy Béla";s:8:"language";s:1:"1";s:5:"email";s:16:"nagy.bela@ceg.hu";s:14:"core_person_id";i:672;s:22:"core_legal_entities_id";i:733;}','created_at' => '2023-07-19 09:46:20','updated_at' => '2023-07-19 09:46:20',],
            ['id' => 58, 'user_id' => 1,'subdomain_id' => 3,'level' => 1,'what' => 'Külsős admin létrehozása','with' => 'a:3:{s:6:"firmId";s:1:"2";s:14:"core_person_id";s:3:"672";s:22:"core_legal_entities_id";i:734;}','created_at' => '2023-07-19 09:47:24','updated_at' => '2023-07-19 09:47:24',],
            ['id' => 59, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-19 11:35:21','updated_at' => '2023-07-19 11:35:21',],
            ['id' => 60, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-20 09:09:23','updated_at' => '2023-07-20 09:09:23',],
            ['id' => 61, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-21 07:16:29','updated_at' => '2023-07-21 07:16:29',],
            ['id' => 62, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-24 08:57:16','updated_at' => '2023-07-24 08:57:16',],
            ['id' => 63, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-25 08:18:33','updated_at' => '2023-07-25 08:18:33',],
            ['id' => 64, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-26 08:28:15','updated_at' => '2023-07-26 08:28:15',],
            ['id' => 65, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-26 13:16:37','updated_at' => '2023-07-26 13:16:37',],
            ['id' => 66, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-27 08:16:57','updated_at' => '2023-07-27 08:16:57',],
            ['id' => 67, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-27 12:25:42','updated_at' => '2023-07-27 12:25:42',],
            ['id' => 68, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-07-27 12:33:06','updated_at' => '2023-07-27 12:33:06',],
            ['id' => 69, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-08-01 11:40:53','updated_at' => '2023-08-01 11:40:53',],
            ['id' => 70, 'user_id' => 1,'subdomain_id' => 5,'level' => 1,'what' => 'Példány adatainak szerkesztése','with' => 'a:12:{s:11:"subdomainId";s:1:"5";s:4:"name";s:6:"mars_p";s:9:"subdomain";s:4:"mars";s:7:"db_name";s:8:"ej2_mars";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:8:"ej2_mars";s:11:"db_password";s:16:"kxIrLsI9Z9ly3Qbx";s:5:"state";s:1','created_at' => '2023-08-01 12:08:50','updated_at' => '2023-08-01 12:08:50',],
            ['id' => 71, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-08-02 09:27:21','updated_at' => '2023-08-02 09:27:21',],
            ['id' => 72, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-08-04 13:58:17','updated_at' => '2023-08-04 13:58:17',],
            ['id' => 73, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-08-07 08:27:14','updated_at' => '2023-08-07 08:27:14',],
            ['id' => 74, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-08-08 09:15:36','updated_at' => '2023-08-08 09:15:36',],
            ['id' => 75, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-08-09 08:19:29','updated_at' => '2023-08-09 08:19:29',],
            ['id' => 76, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-08-15 08:51:47','updated_at' => '2023-08-15 08:51:47',],
            ['id' => 77, 'user_id' => 1,'subdomain_id' => 3,'level' => 1,'what' => 'Példány adatainak szerkesztése','with' => 'a:12:{s:11:"subdomainId";s:1:"3";s:4:"name";s:17:"Down Alapítvány";s:9:"subdomain";s:2:"da";s:7:"db_name";s:8:"ej2_da_p";s:7:"db_host";s:9:"localhost";s:7:"db_port";s:4:"3306";s:7:"db_user";s:8:"ej2_da_p";s:11:"db_password";s:15:"VQTTCmNHUB2uiKV";s:5:"sta','created_at' => '2023-08-15 08:52:13','updated_at' => '2023-08-15 08:52:13',],
            ['id' => 78, 'user_id' => 1,'subdomain_id' => 3,'level' => 1,'what' => 'SSO kliens létrehozása','with' => 'client_name: SSO Down','created_at' => '2023-08-15 08:55:42','updated_at' => '2023-08-15 08:55:42',],
            ['id' => 79, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-08-15 14:52:03','updated_at' => '2023-08-15 14:52:03',],
            ['id' => 80, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-09-04 10:43:35','updated_at' => '2023-09-04 10:43:35',],
            ['id' => 81, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-09-04 11:41:01','updated_at' => '2023-09-04 11:41:01',],
            ['id' => 82, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu','created_at' => '2023-09-08 07:58:08','updated_at' => '2023-09-08 07:58:08',],
            ['id' => 83, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu',],
            ['id' => 84, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu',],
            ['id' => 85, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu',],
            ['id' => 86, 'user_id' => 1,'subdomain_id' => 0,'level' => 1,'what' => 'Belépés a központba','with' => 'ejadmin@softc.hu',],
        ]; 
        $count = count($arr_logs);
        
        $this->command->warn(PHP_EOL . 'Creating logs...');
        
        $this->command->getOutput()->progressStart($count);
        foreach($arr_logs as $log)
        {
            Log::factory()->create($log);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
        
        $this->command->info(PHP_EOL . 'Logs created');
    }
}