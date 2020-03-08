<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TransactionDetail extends Model
{
    use softDeletes;

    protected $fillable = [
        'transactions_id', 'username', 'nationality', 'is_visa', 'doe_passport'
    ];

    protected $hiddden = [

    ];
    protected $table = 'transaction_detail';
    protected $primaryKey = 'transaction_detail_id';

    public function transaction(){
        return $this->belongsTo(Transactions::class, 'transactions_id', 'transactions_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
