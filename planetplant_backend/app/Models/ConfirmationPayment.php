<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmationPayment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['code','name','id_transaction','transfer_date','slip_transfer','payment','id_payment_type','notes','payment_status','updatedby'];
}
