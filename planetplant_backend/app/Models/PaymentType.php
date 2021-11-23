<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use SoftDeletes;
    protected $table = 'payment_types';
    protected $fillable = ['code','type','note','createdby','updatedby','deletedby'];
}
