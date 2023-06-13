<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elus extends Model
{
    use HasFactory;
    protected $fillable =['province', 'circonscription', 'sigle', 'voix_liste', 'nom', 'postnom','prenom', 'fonction','sexe', 'age', 'voix_candidat'];
}
