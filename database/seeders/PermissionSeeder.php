<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'create-role',
            'edit-role',
            'delete-role',
            'create-user',
            'edit-user',
            'delete-user',
            'view-course',
            'create-course',
            'edit-course',
            'delete-course'
         ];

         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}
