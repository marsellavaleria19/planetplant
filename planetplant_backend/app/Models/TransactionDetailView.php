<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetailView extends Model
{
    protected $table = 'transactiondetailviews';

    public function transaction()
    {
        return $this->belongsTo(TransactionView::class,'id_transaction','id');
    }

    public function getPhotoAttribute($value){
        return url('storage/',$value);
    }
}
