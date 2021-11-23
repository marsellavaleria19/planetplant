<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemView extends Model
{
    protected $table = 'itemviews';

    public function getPhotoAttribute($value){
        return url('storage/',$value);
    }
}
