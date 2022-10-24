<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participants;
class InfoReservation extends Model
{
    use HasFactory;

    protected $table='info_reservations';
    protected $fillable=[

        'IdPart',
        'City',
        'Type',
        'NbrRoom',
        'From',
        'To',

    ];

    public function ReservedBy(){

        return $this->BelongsTo(Participants::class, 'IdPart','id');
        // return $this->hasOne(Participants::class, 'id','IdPart');

    }
}
