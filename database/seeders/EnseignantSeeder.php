<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Database\Seeder;

class EnseignantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
{
    $user1 = User::where('email', 'malikkondi@gmail.com')->first();
    $user2 = User::where('email', 'sani@gmail.com')->first();
    

    Enseignant::create([
        
        
        
        'specialite' => 'Laravel',
        'user_id' => $user1->user_id,
    ]);

    Enseignant::create([
        
       
        'specialite' => 'Base de données',
        'user_id' => $user2->user_id,
    ]);
    }

}