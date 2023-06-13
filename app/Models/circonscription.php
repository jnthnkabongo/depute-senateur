<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class circonscription extends Model
{
    use HasFactory;
    protected $fillable = ['circons_id', 'nom_circons', 'province_id'];
}
