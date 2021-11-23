<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemType extends Model
{
    use SoftDeletes;
    protected $table = 'item_types';
    protected $fillable = ['code','name','cover','createdby','updatedby','deletedby'];

    public function getCoverAttribute($value){
        return url('storage/',$value);
    }
}
