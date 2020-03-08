<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TravelPacks extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'slug', 'countries_id', 'about', 'featured_event', 'language', 
        'foods', 'departure_date', 'duration', 'type', 'price'
    ];
    protected $hiddem = [];
    protected $primaryKey = 'travel_packs_id';

    public function galleries(){
        return $this->hasMany(Galleries::class, 'travel_packs_id', 'travel_packs_id');
    }
    public function countries(){
        return $this->belongsTo(Countries::class, 'countries_id', 'countries_id');
    }

}
