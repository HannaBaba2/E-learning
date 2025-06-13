<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiant;
use Illuminate\Database\Seeder;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = [
            [
                'nom' => 'BABA',
                'prenom' => 'Traore Hannatou',
                'dateNaissance' => '2003-06-15',
                'telephone' => '90909138',
                'adresse' => 'Sokode-didaoure',
                'email' => 'traorehanna01@gmail.com',
                'mot de passe' => Hash::make('1234'),
            ],
            [
                'nom' => 'DEGBEBIA',
                'prenom' => 'Aïmane',
                'dateNaissance' => '2003-06-15',
                'telephone' => '93493235',
                'adresse' => 'Sokode-komah',
                'email' => 'degbebiatraore@gmail.com',
                'mot de passe' => Hash::make('1234'),
            ],
        ];

        foreach ($etudiants as $etudiant) {
            Etudiant::create($etudiant);
        }
    }

}
