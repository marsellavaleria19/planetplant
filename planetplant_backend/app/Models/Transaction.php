<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['code','id_customer','transaction_date','id_receiver','id_billing','tax_percent','tax_price',
    'shipping_name','shipping_type','shipping_price','transaction_total','transaction_status','payment_status','updatedby'];

    public function details()
    {
        return $this->hasMany(TransactionItem::class,'id_transaction');
    }
}
