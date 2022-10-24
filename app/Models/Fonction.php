<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participants;

class Fonction extends Model
{
    use HasFactory;
    protected $table='fonctions';
    protected $fillable=[
        'id',
        'label',
        'color',

    ];


    public function belongTo(){

        // return $this->hasMany(Participants::class,'id','IdFonction');
        return $this->hasMany(Participants::class,'IdFonction','id');
    }
}
