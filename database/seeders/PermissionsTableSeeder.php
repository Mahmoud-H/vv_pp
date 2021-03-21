<?php

namespace Database\Seeders;

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
                'id'    => 17,
                'title' => 'main_access',
            ],
            [
                'id'    => 18,
                'title' => 'setting_access',
            ],
            [
                'id'    => 19,
                'title' => 'governorate_create',
            ],
            [
                'id'    => 20,
                'title' => 'governorate_edit',
            ],
            [
                'id'    => 21,
                'title' => 'governorate_show',
            ],
            [
                'id'    => 22,
                'title' => 'governorate_delete',
            ],
            [
                'id'    => 23,
                'title' => 'governorate_access',
            ],
            [
                'id'    => 24,
                'title' => 'departement_create',
            ],
            [
                'id'    => 25,
                'title' => 'departement_edit',
            ],
            [
                'id'    => 26,
                'title' => 'departement_show',
            ],
            [
                'id'    => 27,
                'title' => 'departement_delete',
            ],
            [
                'id'    => 28,
                'title' => 'departement_access',
            ],
            [
                'id'    => 29,
                'title' => 'visitor_create',
            ],
            [
                'id'    => 30,
                'title' => 'visitor_edit',
            ],
            [
                'id'    => 31,
                'title' => 'visitor_show',
            ],
            [
                'id'    => 32,
                'title' => 'visitor_delete',
            ],
            [
                'id'    => 33,
                'title' => 'visitor_access',
            ],
            [
                'id'    => 34,
                'title' => 'team_create',
            ],
            [
                'id'    => 35,
                'title' => 'team_edit',
            ],
            [
                'id'    => 36,
                'title' => 'team_show',
            ],
            [
                'id'    => 37,
                'title' => 'team_delete',
            ],
            [
                'id'    => 38,
                'title' => 'team_access',
            ],
            [
                'id'    => 39,
                'title' => 'deposit_type_create',
            ],
            [
                'id'    => 40,
                'title' => 'deposit_type_edit',
            ],
            [
                'id'    => 41,
                'title' => 'deposit_type_show',
            ],
            [
                'id'    => 42,
                'title' => 'deposit_type_delete',
            ],
            [
                'id'    => 43,
                'title' => 'deposit_type_access',
            ],
            [
                'id'    => 44,
                'title' => 'office_create',
            ],
            [
                'id'    => 45,
                'title' => 'office_edit',
            ],
            [
                'id'    => 46,
                'title' => 'office_show',
            ],
            [
                'id'    => 47,
                'title' => 'office_delete',
            ],
            [
                'id'    => 48,
                'title' => 'office_access',
            ],
            [
                'id'    => 49,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 50,
                'title' => 'edit_in_date_time',
            ],
            [
                'id'    => 51,
                'title' => 'visitor_out',
            ],
             [
                'id'    => 52,
                'title' => 'edit_out_date_time',
            ],
            
        ];

        Permission::insert($permissions);
    }
}
