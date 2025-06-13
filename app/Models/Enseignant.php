<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Enseignant extends Model
{
    //
     use HasFactory;

    protected $primaryKey = 'enseignant_id';

    

    protected $fillable = ['nom', 'prenom','dateNaissance','specialite','telephone','adresse','email', 'mot de passe'];

    public function cours():HasMany{
        return $this->hasMany(Cour::class);
    }
}
