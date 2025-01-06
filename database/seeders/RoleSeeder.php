<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $productManager = Role::create(['name' => 'Product Manager']);
        $user = Role::create(['name' => 'User']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-course',
            'edit-course',
            'delete-course'
        ]);

        $productManager->givePermissionTo([
            'create-course',
            'edit-course',
            'delete-course'
        ]);

        $user->givePermissionTo([
            'view-course'
        ]);
    }
}
