<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use App\Models\Enseignant;
use App\Models\Etudiant;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'dateNaissance',
        'telephone',
        'adresse',
        'email',
        'password',
    ];

    protected $primaryKey ='user_id';


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function etudiant()
    {
        return $this->hasOne(Etudiant::class,'user_id');
    }

    public function enseignant()
    {
        return $this->hasOne(Enseignant::class,'user_id');
    }
    /**
     * Get cours from current cours
     */


    /**
     * Get assign cours
     */

//  public function assign_cours(): BelongsToMany
//  {
//     return $this->belongsToMany(
//         Cour::class,
//         'inscription',
//         'user_id',
//         'cour_id'
//     )->using(Inscription::class);
// }
    // Dans le modèle User.php
    public function cours() {
        return $this->hasMany(Cour::class, 'user_id'); // Assurez-vous que 'user_id' est la clé étrangère correcte
    }

}
