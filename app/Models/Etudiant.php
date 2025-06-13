<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Etudiant extends Model
{
    //

     use HasFactory;

    protected $primaryKey = 'etudiant_id';

    protected $fillable = ['nom', 'prenom','dateNaissance','telephone','adresse','email', 'mot_de_passe'];


    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    public function cours() {
        return $this->belongsToMany(Cours::class, 'inscriptions');
    }
}

