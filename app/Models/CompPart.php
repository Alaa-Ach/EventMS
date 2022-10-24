<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participants;
class CompPart extends Model
{
    use HasFactory;

    protected $table='comp_parts';
    protected $fillable=[
    'IdPart',
    'N_Passport',
    'Prenom',
    'Nom',
    'IdFonction',
    'Pays',
    'Transport',
    'IdVol',
    ];


    public function Vol(){

        return $this->hasOne(Vol::class, 'id', 'IdVol');

    }
     public function withComp(){

        // return $this->BelongsTo(Participants::class, 'IdPart','id');
        return $this->hasOne(Participants::class, 'id','IdPart');

    }
    public function Fonction(){

        return $this->hasOne(Fonction::class, 'id','IdFonction');

    }
}
