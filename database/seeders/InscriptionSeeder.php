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
        {
        $etudiant1 = Etudiant::first();           
        $etudiant2 = Etudiant::skip(1)->first();  

        $cours1 = Cour::first();                 
        $cours2 = Cour::skip(1)->first();        

        
        Inscription::create([
            'etudiant_id' => $etudiant1->etudiant_id,
            'cour_id' => $cours1->cour_id,
            'paiement' => false,
        ]);

     
        Inscription::create([
            'etudiant_id' => $etudiant2->etudiant_id,
            'cour_id' => $cours2->cour_id,
            'paiement' => true,
        ]);

        
    }
}

}