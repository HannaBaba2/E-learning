<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cour;
use App\Models\Enseignant;

class CourSeeder extends Seeder
{
    public function run(): void
    {
        $enseignants = Enseignant::all();

        if ($enseignants->isEmpty()) {
            echo "Aucun enseignant trouvé. Veuillez enregistré un enseignantd'abord.\n";
            return;
        }

        foreach ($enseignants as $index => $enseignant) {
            Cour::create([
                'titre' => "Cours Exemple " . ($index + 1),
                'description' => "Ceci est le cours numéro " . ($index + 1),
                'fichier' => "cours_fichiers/exemple_" . ($index + 1) . ".pdf", 
                'enseignant_id' => $enseignant->enseignant_id,
            ]);
        }

        echo "Cours créés avec succès pour chaque enseignant.\n";
    }
}
