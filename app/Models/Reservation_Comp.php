<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_Comp extends Model
{
    use HasFactory;

    protected $table='Reservation_Comp';
    protected $fillable=[
        'IdPart',
        'HotelName',
        'Type',
        'Nbr_Personne',
        'From',
        'To'
    ];


    public function ReservedBy(){

        return $this->BelongsTo(Participant_WC::class, 'IdPart','id');


    }



}
