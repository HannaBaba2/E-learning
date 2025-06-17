<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        $users=[

            [
                'nom' => 'KOUMOI',
                'prenom' => 'Sani',
                'dateNaissance'=>'2002-01-19',
                'telephone'=>'98112012',
                'adresse'=>'Sokodé_Barrière',
                'email' => 'sani@gmail.com',
                'password' => Hash::make('baba'),
            ],
            [
                'nom' => 'baba',
                'prenom' => 'hanna',
                'dateNaissance'=>'1999-01-19',
                'telephone'=>'98112012',
                'adresse'=>'Sokodé_Didaoure',
                'email' => 'traorehanna01@gmail.com',
                'password' => Hash::make('baba'),
            ],
            [
                'nom' => 'makik',
                'prenom' => 'kondi',
                'dateNaissance'=>'',
                'telephone'=>'98112012',
                'adresse'=>'Sokodé_Komah',
                'email' => 'malikkondi@gmail.com',
                'password' => Hash::make('baba'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
} 
}

