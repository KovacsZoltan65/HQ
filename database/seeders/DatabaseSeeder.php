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
            UserSeeder::class,              // OK
            BookSeeder::class,              // OK
            PostSeeder::class,              // OK
            
            RoleSeeder::class,              // OK
            PermissionSeeder::class,        // OK
            ModelHasRolesTableSeeder::class,
            ModelHasPermissionTableSeeder::class,   // OK
            RoleHasPermissionsTableSeeder::class,   // OK
            
            ComponentsTableSeeder::class,   // OK
            HqSettingsTableSeeder::class,   // OK
            LogsTableSeeder::class,
            MirrorStatusesTableSeeder::class,
            ScheduledShutdownsTableSeeder::class,
            SeedsTableSeeder::class,
            SubdomainComponentsTableSeeder::class,
            SubdomainsTableSeeder::class,   // OK
        ]);
    }
}
