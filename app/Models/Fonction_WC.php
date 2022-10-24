<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction_WC extends Model
{
    use HasFactory;

    protected $table='fonction__w_c_s';
    protected $fillable=[
        'id',
        'label',
        'color',

    ];


}
