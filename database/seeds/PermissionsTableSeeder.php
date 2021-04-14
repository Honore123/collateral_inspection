<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 39,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 40,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 41,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 42,
                'title' => 'earth_access',
            ],
            [
                'id'    => 43,
                'title' => 'earth_create',
            ],
            [
                'id'    => 44,
                'title' => 'earth_edit',
            ],
            [
                'id'    => 45,
                'title' => 'earth_show',
            ],
            [
                'id'    => 46,
                'title' => 'earth_delete',
            ],
            [
                'id'    => 47,
                'title' => 'property_access',
            ],
            [
                'id'    => 48,
                'title' => 'report_access',
            ],
        ];

        Permission::insert($permissions);
    }
}