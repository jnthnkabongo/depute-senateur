<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    use HasFactory;
    protected $fillable = ['uti_id','nom_uti', 'postnom_uti','prenom_uti', 'age', 'sexe', 'sigle', 'voix_liste', 'voix_candidat'];

}
