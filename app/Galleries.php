<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Galleries extends Model
{
    use softDeletes;

    protected $fillable = [
        'travel_packs_id', 'image'
    ];

    protected $hidden = [];
    
    protected $primaryKey = "galleries_id";

    public function travel_packs(){
        return $this->belongsTo(TravelPacks::class, 'travel_packs_id', 'travel_packs_id');
    }
}
