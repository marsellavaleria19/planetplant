<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receiver extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','name','address','id_city','type_city','city','id_province','province','postalcode','phone_number','id_customer'];
}
