<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{

    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'KomronRaximov',
            'email' => 'raximovkamron3@gmail.com',
            'password' => Hash::make('komron1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        $admin = User::create([
            'name' => 'Komron2',
            'email' => 'kamronraximov31@gmail.com',
            'password' => Hash::make('raximov1234')
        ]);
        $admin->assignRole('Admin');

        $productManager = User::create([
            'name' => 'Hikmat',
            'email' => 'hikmat@gmail.com',
            'password' => Hash::make('hikmat1234')
        ]);
        $productManager->assignRole('Product Manager');

        $user = User::create([
            'name' => 'Asror',
            'email' => 'asror@gmail.com',
            'password' => Hash::make('asror1234')
        ]);
        $user->assignRole('User');
    }
}
