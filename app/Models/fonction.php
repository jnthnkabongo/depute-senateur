<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fonction extends Model
{
    use HasFactory;
    protected $fillable = ['fonction_id','nom_fonc', 'uti_id'];

}
