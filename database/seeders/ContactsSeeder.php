<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company1 = Company::find(1); // Kullanıcıyı bulun

        $company1->contacts()->create([
            'name' => 'Adem Öz',
            'company_name' => 'Safari Group',
            'phone' => '0000000000',
            'email' => 'deneme1@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company1->contacts()->create([
            'name' => 'Ali Balta',
            'company_name' => 'Safari Group',
            'phone' => '0000000000',
            'email' => 'deneme2@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company1->contacts()->create([
            'name' => 'Ata Türkoğlu',
            'company_name' => 'Safari Group',
            'phone' => '0000000000',
            'email' => 'deneme3@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);

        $company1->contacts()->create([
            'name' => 'Serkan Çelik',
            'company_name' => 'Safari Group',
            'phone' => '0000000000',
            'email' => 'deneme4@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company1->contacts()->create([
            'name' => 'Kadir Polat',
            'company_name' => 'Safari Group',
            'phone' => '0000000000',
            'email' => 'deneme5@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company1->contacts()->create([
            'name' => 'Ahmet Sarı',
            'company_name' => 'Safari Group',
            'phone' => '0000000000',
            'email' => 'deneme6@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);

        $company1->contacts()->create([
            'name' => 'Celil Demir',
            'company_name' => 'Safari Group',
            'phone' => '0000000000',
            'email' => 'deneme7@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);

        $company1->contacts()->create([
            'name' => 'Melih Kaya',
            'company_name' => 'Safari Group',
            'phone' => '0000000000',
            'email' => 'deneme8@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company1->contacts()->create([
            'name' => 'Yunus Aşuroğlu',
            'company_name' => 'Asur Group',
            'phone' => '0000000000',
            'email' => 'deneme9@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company1->contacts()->create([
            'name' => 'Cevdet Şirin',
            'company_name' => 'Asur Group',
            'phone' => '0000000000',
            'email' => 'deneme10@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);



        $company2 = Company::find(2);

        $company2->contacts()->create([
            'name' => 'Zekeriya Ulu',
            'company_name' => 'Çelik Lojistik Group',
            'phone' => '0000000000',
            'email' => 'ornek1@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company2->contacts()->create([
            'name' => 'Gülizar Çiçek',
            'company_name' => 'Çelik Lojistik Group',
            'phone' => '0000000000',
            'email' => 'ornek2@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company2->contacts()->create([
            'name' => 'Sevda Ak',
            'company_name' => 'Çelik Lojistik Group',
            'phone' => '0000000000',
            'email' => 'ornek3@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);

        $company2->contacts()->create([
            'name' => 'Serkan Çelik',
            'company_name' => 'Çelik Lojistik Group',
            'phone' => '0000000000',
            'email' => 'ornek4@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company2->contacts()->create([
            'name' => 'Gürkan Çilek',
            'company_name' => 'Çelik Lojistik Group',
            'phone' => '0000000000',
            'email' => 'ornek5@gmail.com',
            'type' => '1',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company2->contacts()->create([
            'name' => 'Mahir Poyraz',
            'company_name' => 'Çelik Lojistik Group',
            'phone' => '0000000000',
            'email' => 'ornek6@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);

        $company2->contacts()->create([
            'name' => 'Ramazan Taşçı',
            'company_name' => 'Çelik Lojistik Group',
            'phone' => '0000000000',
            'email' => 'ornek7@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);

        $company2->contacts()->create([
            'name' => 'Alp Kuru',
            'company_name' => 'Çelik Lojistik Group',
            'phone' => '0000000000',
            'email' => 'ornek8@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company2->contacts()->create([
            'name' => 'Ferit Kemer',
            'company_name' => 'Asur Group',
            'phone' => '0000000000',
            'email' => 'ornek9@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);
        $company2->contacts()->create([
            'name' => 'Özkan Yağmur',
            'company_name' => 'Asur Group',
            'phone' => '0000000000',
            'email' => 'ornek10@gmail.com',
            'type' => '2',
            'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        ]);



        // $user3 = User::find(4);

        // $user3->contacts()->create([
        //     'name' => 'Kaan Demir',
        //     'company_name' => 'Safari Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example1@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user3->contacts()->create([
        //     'name' => 'Altay Kara',
        //     'company_name' => 'Safari Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example2@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user3->contacts()->create([
        //     'name' => 'Cemil Yuvacı',
        //     'company_name' => 'Safari Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example3@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);

        // $user3->contacts()->create([
        //     'name' => 'Serkan Adal',
        //     'company_name' => 'Safari Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example4@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user3->contacts()->create([
        //     'name' => 'Yuşa Dal',
        //     'company_name' => 'Safari Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example5@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user3->contacts()->create([
        //     'name' => 'Kürşad Öz',
        //     'company_name' => 'Safari Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example6@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);

        // $user3->contacts()->create([
        //     'name' => 'Kamil Ot',
        //     'company_name' => 'Safari Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example7@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);

        // $user3->contacts()->create([
        //     'name' => 'Gül Albayrak',
        //     'company_name' => 'Safari Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example8@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user3->contacts()->create([
        //     'name' => 'Hakkı Çakar',
        //     'company_name' => 'Asur Group',
        //     'phone' => '0000000000',
        //     'email' => 'example9@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user3->contacts()->create([
        //     'name' => 'Arda Kıvrak',
        //     'company_name' => 'Asur Group',
        //     'phone' => '0000000000',
        //     'email' => 'example10@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);





        // $user4 = User::find(5);

        // $user4->contacts()->create([
        //     'name' => 'Hasan Çolak',
        //     'company_name' => 'Asur Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example1@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user4->contacts()->create([
        //     'name' => 'Atilla Uğur',
        //     'company_name' => 'Asur Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example2@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user4->contacts()->create([
        //     'name' => 'Ömer Karcı',
        //     'company_name' => 'Asur Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example3@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);

        // $user4->contacts()->create([
        //     'name' => 'Gizem Culum',
        //     'company_name' => 'Asur Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example4@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user4->contacts()->create([
        //     'name' => 'Dilara Yaş',
        //     'company_name' => 'Asur Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example5@gmail.com',
        //     'type' => '1',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user4->contacts()->create([
        //     'name' => 'Alparslan Türk',
        //     'company_name' => 'Asur Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example6@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);

        // $user4->contacts()->create([
        //     'name' => 'Aybilge Dağ',
        //     'company_name' => 'Asur Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example7@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);

        // $user4->contacts()->create([
        //     'name' => 'Aybike Sarı',
        //     'company_name' => 'Asur Transport',
        //     'phone' => '0000000000',
        //     'email' => 'example8@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user4->contacts()->create([
        //     'name' => 'Hakkı Çakar',
        //     'company_name' => 'Asur Group',
        //     'phone' => '0000000000',
        //     'email' => 'example9@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
        // $user4->contacts()->create([
        //     'name' => 'Arda Kıvrak',
        //     'company_name' => 'Asur Group',
        //     'phone' => '0000000000',
        //     'email' => 'example10@gmail.com',
        //     'type' => '2',
        //     'address' => '{"country":"Türkiye","city":"Erzurum","street":"detay","zip_code":"18877"}',
        // ]);
    }
}
