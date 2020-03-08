<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Countries extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'country', 'about', 'image'
    ];
    protected $hiddem = [];
    protected $primaryKey = 'countries_id';



}
