<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Transactions extends Model
{
    use softDeletes;
    protected $fillable = [
        'travel_packs_id', 'users_id', 'additional_visa', 'transaction_total', 'transaction_status'
    ];
    protected $hidden = [

    ];
    protected $primaryKey = 'transactions_id';

    protected $table = 'transactions';

    public function details(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id','transactions_id');
    }
    public function travel_packs(){
        return $this->belongsTo(TravelPacks::class, 'travel_packs_id', 'travel_packs_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
