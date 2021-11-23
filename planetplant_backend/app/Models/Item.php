<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $fillable = ['code','name','qty','price','discount','description','photo','id_type','createdby','updatedby','deletedby'];

    public function getPhotoAttribute($value){
        return url('storage/',$value);
    }
}
