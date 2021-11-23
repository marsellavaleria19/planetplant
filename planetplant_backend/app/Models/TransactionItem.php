<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $table = 'transaction_items';

    protected $fillable = ['id_transaction','id_item','qty','price','discount','totalprice','total'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'id_transaction','id');
    }

}
