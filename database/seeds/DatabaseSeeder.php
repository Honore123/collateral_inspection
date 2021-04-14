<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            CeilingSeeder::class,
            ElevationSeeder::class,
            FoundationSeeder::class,
            PavementSeeder::class,
            RoofSeeder::class,
            TenureTypeSeeder::class,
            DoorWindowSeeder::class,

        ]);
        $rwandaAdusPath = './database/files/rwanda_adus.sql';
        DB::unprepared(file_get_contents($rwandaAdusPath));
    }
}
