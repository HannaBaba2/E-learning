<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Cour extends Model
{
    use HasFactory;

    protected $primaryKey = 'cour_id';

    protected $fillable = ['titre', 'description','fichier', 'enseignant_id'];


    // public function getAuthorAttribute(): string{

    //     return $this->user->nom;
    // }


    public function user():BelongsTo{

        return $this->belongsTo(User::class,'user_id');
     }

    public function enseignant() {
        return $this->belongsTo(Enseignant::class);
    }

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    // public function etudiants() {
    //     return $this->belongsToMany(
    //     Etudiant::class,
    //     'inscriptions',
    //     'cour_id',
    //     'etudiant_id'
    // )->withPivot('paiement')->withTimestamps();
    // }


    // public function assign_users(): BelongsToMany{

    //     return $this->BelongsToMany(User::class,'inscriptions','cour_id','etudiant_id','user_id',)->using(Inscription::class);
    // }
}
