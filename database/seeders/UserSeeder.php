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
                'nom' => 'Doe',
                'prenom' => 'John',
                'statut' => 'Admin',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('baba'),
            ],
            [
                'nom' => 'baba',
                'prenom' => 'hanna',
                'statut' => 'etudiant',
                'email' => 'traorehanna01@gmail.com',
                'password' => Hash::make('baba'),
            ],
            [
                'nom' => 'makik',
                'prenom' => 'kondi',
                'statut' => 'enseignant',
                'email' => 'malikkondi@gmail.com',
                'password' => Hash::make('baba'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
} 
}

