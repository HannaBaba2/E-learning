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

    protected $fillable = ['niveau','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    // public function cours() {
    //     return $this->belongsToMany(
    //     Cour::class,
    //     'inscriptions',         
    //     'etudiant_id',         
    //     'cour_id'               
    // )->withPivot('paiement')->withTimestamps();
    // }
}

