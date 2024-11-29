<?php

namespace Database\Seeders;

use App\Models\ShipmentInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShipmentInfo::create([
            'company_id' => 1, // Örneğin, şirket ID'si 1 olan bir şirket için veri ekliyoruz
            'type' => 1,
            'info' => json_encode([
                'company_name' => 'Asur Group',
                'name' => 'Yunus Emre Aşuroğlu',
                'phone' => '905350195525',
                'street' => '123 Main St',
                'zip_code' => '12345',
                'city' => 'Anytown',
                'country' => 'USA'
            ]),
        ]);

        ShipmentInfo::create([
            'company_id' => 1, // Örneğin, şirket ID'si 1 olan bir şirket için veri ekliyoruz
            'type' => 2,
            'info' => json_encode([
                'company_name' => 'Safari Group',
                'name' => 'Tarık Önal',
                'phone' => '000000000',
                'street' => '123 Main St',
                'zip_code' => '12345',
                'city' => 'Anytown',
                'country' => 'Almanya'
            ]),
        ]);
        
        ShipmentInfo::create([
            'company_id' => 1, // Örneğin, şirket ID'si 1 olan bir şirket için veri ekliyoruz
            'type' => 1,
            'info' => json_encode([
                'company_name' => 'Safari Group',
                'name' => 'Hamit Karakaya',
                'phone' => '000000000',
                'street' => '123 Main St',
                'zip_code' => '12345',
                'city' => 'Berlin',
                'country' => 'Almanya'
            ]),
        ]);
    }
}
