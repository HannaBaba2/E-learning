<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Enseignant;
use Illuminate\Database\Seeder;

class EnseignantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $enseignants = [
            [
                'nom' => 'KOUMOI',
                'prenom' => 'Sani',
                'dateNaissance' => '1999-01-19',
                'specialite' => 'Base de donnee',
                'telephone' => '98112012',
                'adresse' => 'Sokode_Bariere',
                'email' => 'sani@gmail.com',
                'mot de passe' => Hash::make('1234'),
            ],
            [
                'nom' => 'KONDI',
                'prenom' => 'Malik',
                'dateNaissance' => '2002-01-19',
                'specialite' => 'Laravel',
                'telephone' => '98112012',
                'adresse' => 'Sokode_Komah',
                'email' => 'malikkondi@gmail.com',
                'mot de passe' => Hash::make('1234'),
            ]
        ];

        foreach ($enseignants as $enseignant) {
            Enseignant::create($enseignant);
        }
    }
}

