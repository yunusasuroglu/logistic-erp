<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        
        $admin = User::create([
            'name' => 'Tarık',
            'surname' => 'Önal',
            'status' => '1',
            'address' => '{"country":"null","city":"null","street":"null","zip_code":"null"}',
            'phone' => '05350195525',
            'email' => 'safari@gmail.com',
            'password' => Hash::make('1234789')
        ]);
        $cAdmin1 = User::create([
            'name' => 'Şehmus',
            'surname' => 'Öztep',
            'status' => '1',
            'company_id' => '1',
            'address' => '{"country":"null","city":"null","street":"null","zip_code":"null"}',
            'phone' => '000000000',
            'email' => 'Sehmus@oeztep-transporte.de',
            'password' => Hash::make('123456789')
        ]);
        $cAdmin2 = User::create([
            'name' => 'Abed',
            'surname' => 'Öztep',
            'status' => '1',
            'company_id' => '1',
            'address' => '{"country":"null","city":"null","street":"null","zip_code":"null"}',
            'phone' => '000000000',
            'email' => 'Abed@oeztep-transporte.de',
            'password' => Hash::make('123456789')
        ]);
        $cAdmin3 = User::create([
            'name' => 'Bilal',
            'surname' => 'Öztep',
            'status' => '1',
            'company_id' => '1',
            'address' => '{"country":"null","city":"null","street":"null","zip_code":"null"}',
            'phone' => '000000000',
            'email' => 'Bilal@oeztep-transporte.de',
            'password' => Hash::make('123456789')
        ]);
        $cAdmin4 = User::create([
            'name' => 'Rafat',
            'surname' => 'Öztep',
            'status' => '1',
            'company_id' => '1',
            'address' => '{"country":"null","city":"null","street":"null","zip_code":"null"}',
            'phone' => '000000000',
            'email' => 'Rafat@oeztep-transporte.de',
            'password' => Hash::make('123456789')
        ]);
        $cAdmin5 = User::create([
            'name' => 'Ismail',
            'surname' => 'Öztep',
            'status' => '1',
            'company_id' => '1',
            'address' => '{"country":"null","city":"null","street":"null","zip_code":"null"}',
            'phone' => '000000000',
            'email' => 'ismail@oeztep-transporte.de',
            'password' => Hash::make('123456789')
        ]);
        // Rolleri oluşturun
        $superAdminRole = Role::create(['guard_name' => 'superadmin','name' => 'Süper Admin']);
        $adminRole = Role::create(['name' => 'Firmenleiter']);
        
        Role::create(['name' => 'Mitarbeiter']);
        
        $admin->assignRole($superAdminRole);
        $cAdmin1->assignRole($adminRole);
        $cAdmin2->assignRole($adminRole);
        $cAdmin3->assignRole($adminRole);
        $cAdmin4->assignRole($adminRole);
        $cAdmin5->assignRole($adminRole);
        // Rollere izinleri atayın // Yeni izin, 'Firmenleiter' rolüne atanıyor
    }
}
