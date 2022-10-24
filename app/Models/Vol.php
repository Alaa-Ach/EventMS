<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participants;
use App\Models\CompPart;


class Vol extends Model
{
    use HasFactory;

    protected $table='vols';

    protected $fillable=[
        'N_Vol_Arr',
        'Date_Arr',
        'Heure_Arr',
        'N_Vol_Dep',
        'Date_Dep',
        'Heure_Dep',



    ];


    public function Participant(){

        return $this->hasOne(Participants::class,'IdVol' , 'id');


    }

    public function Compagnon(){


            return $this->hasOne(CompPart::class,'IdVol' , 'id');



        }



}
