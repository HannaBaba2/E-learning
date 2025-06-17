<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Database\Seeder;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $user = User::create([
        'nom' => 'Koffi',
        'prenom' => 'Jean',
        'dateNaissance' => '2001-12-01',
        'telephone' => '90001122',
        'adresse' => 'Lomé',
        'email' => 'koffi@gmail.com',
        'password' => Hash::make('abcd'),
        
    ]);

    Etudiant::create([
         
        'niveau' => 'Licence 2',
        'user_id' => $user->user_id,
    ]);


    $user2 = User::create([
        'nom' => 'BABA',
        'prenom' => 'Traore Hannatou',
        'dateNaissance' => '2001-12-01',
        'telephone' => '90909138',
        'adresse' => 'Lomé',
        'email' => 'hannatraore01@gmail.com',
        'password' => Hash::make('abcd'),

    ]);

    Etudiant::create([
        
        'niveau' => 'Licence 2', 
        'user_id' => $user2->user_id,
    ]);
    }

}
