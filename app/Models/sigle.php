<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sigle extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable =['siglw_id','nom_sigle', 'province_id', 'id_circonsription'];
}
