<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vol;
use App\Models\CompPart;
use App\Models\InfoReservation;
use App\Models\Fonction;
class Participants extends Model
{
    use HasFactory;
    protected $table='participants';

    protected $fillable=[

        'N_Passport',
        'Nom',
        'Prenom',
        'IdFonction',
        'Pays',
        'Nbr_Comp',
        'Transport',
        'IdVol',


    ];


    public function AllRes(){
        // return $this->belongsToMany(InfoReservation::class,'id','IdPart');
        return $this->hasMany(InfoReservation::class,'IdPart','id');

    }


    public function Fonction(){

        return $this->hasOne(Fonction::class, 'id','IdFonction');

    }
    public function Vol(){

        return $this->hasOne(Vol::class, 'id', 'IdVol');

    }
     public function Compagnons(){

        return $this->hasMany(CompPart::class, 'IdPart','id');

    }





}
