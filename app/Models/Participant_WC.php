<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant_WC extends Model
{
    use HasFactory;

    protected $table='participant__w_c_s';

    protected $fillable=[

        'N_Passport',
        'Nom',
        'Prenom',
        'IdSup',
        'IdFonction',
        'Pays',
        'Nbr_Comp',
        'Transport',
        'IdVol',


    ];


    public function Remove()
    {

        $this->AllRes ? $this->AllRes->each->delete() : '';
        $this->Vol ? $this->Vol->delete() : '';

        $this->AllComp ? $this->AllComp->each->delete() : '';


        $this->delete();


        return parent::delete();
    }

    public function Fonction(){

        return $this->hasOne(Fonction_WC::class, 'id','IdFonction');

    }

    public function AllComp(){

        return $this->hasMany(Participant_WC::class, 'IdSup','id');

    }

    public function AllRes(){
        // return $this->belongsToMany(InfoReservation::class,'id','IdPart');
        return $this->hasMany(Reservation_Comp::class,'IdPart','id');

    }

    public function Vol(){

        return $this->hasOne(Vol::class, 'id', 'IdVol');

    }
}
