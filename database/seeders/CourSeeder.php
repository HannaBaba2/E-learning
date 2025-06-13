<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cour;
use App\Models\Enseignant;

class CourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enseignants = Enseignant::pluck('enseignant_id');

        $cours = [
            [
                'titre' => 'Fonction SQL',
                'description' => 'Notion de base sur les fonctions SQL.',
                'enseignant_id' => $enseignants->random(),
            ],
            [
                'titre' => 'Relationship',
                'description' => 'Comment implémenter les relations en Laravel.',
                'enseignant_id' => $enseignants->random(),
            ]
        ];

        foreach ($cours as $cour) {
            Cour::create($cour);
        }
    }
}
