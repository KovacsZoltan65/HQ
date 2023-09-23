<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //UserSeeder::class,
            //BasicAdminPermissionSeeder::class,
            BookSeeder::class,              // OK
            //ComponentsTableSeeder::class,
            //HqSettingsTableSeeder::class,
            LogsTableSeeder::class,
            ModelHasRolesTableSeeder::class,
            //MirrorStatusesTableSeeder::class,
            PostSeeder::class,
            //ScheduledShutdownsTableSeeder::class,
            //SeedsTableSeeder::class,
            RoleSeeder::class,              // OK
            PermissionSeeder::class,        // OK
            ComponentsTableSeeder::class,
            SubdomainsTableSeeder::class,   // OK
            //SubdomainStatesTableSeeder::class,
            //VersionInformationEmailAddressesTableSeeder::class,
        ]);
    }
}
