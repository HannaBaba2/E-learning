<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
class Inscription extends Pivot
{
    //
    use HasFactory;

    //protected $primaryKey = ['etudiant_id','cour_id'];

    protected $table = 'inscriptions';
   

    protected $fillable = ['etudiant_id', 'cour_id', 'paiement'];

    public function etudiant() {
        return $this->belongsTo(Etudiant::class);
    }

    public function cours() {
        return $this->belongsTo(Cour::class);
    }
}

