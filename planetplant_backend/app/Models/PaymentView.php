<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentView extends Model
{
    protected $table = 'paymentviews';

    public function getSlipTransferAttribute($value){
        return url('storage/',$value);
    }
}
