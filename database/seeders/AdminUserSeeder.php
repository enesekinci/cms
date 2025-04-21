<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin rolünü oluştur
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Yönetici',
            'description' => 'Sistem yöneticisi',
        ]);

        // Admin kullanıcısını oluştur
        $admin = User::create([
            'role_id' => $adminRole->id,
            'name' => 'Enes Ekinci',
            'email' => 'enes.eknc.96@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
