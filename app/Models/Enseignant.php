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

    

    protected $fillable = ['specialite','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function cours():HasMany{
        return $this->hasMany(Cour::class,'enseignant_id');
    }
}
