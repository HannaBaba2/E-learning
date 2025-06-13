<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Etudiant;
use App\Models\Cour;
use App\Models\Inscription;
use Illuminate\Database\Seeder;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $etudiant_id = Etudiant::pluck('etudiant_id');
        $cour_id = Cour::pluck('cour_id');

        $inscriptions = [
        [
            'etudiant_id' => $etudiant_id->random(),
            'cour_id' => $cour_id->random(),
            'paiement' => 'payé',
        ],
        [
            'etudiant_id' => $etudiant_id->random(),
            'cour_id' => $cour_id->random(),
            'paiement' => 'impayé',
        ],
        ];

        foreach ($inscriptions as $data) {
            Inscription::create($data);
        }

    }
}
