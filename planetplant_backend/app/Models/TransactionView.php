<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionView extends Model
{
    protected $table = 'transactionviews';

    public function transaction_item()
    {
        return $this->hasMany(TransactionDetailView::class,'id_transaction');
    }
}
