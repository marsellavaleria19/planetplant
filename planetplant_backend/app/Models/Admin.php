<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Model
{
    use SoftDeletes;
    protected $fillable = ['code','name','gender','address','phone_number','email','photo','username','password','createdby','updatedby','deletedby'];

    public static function setAdmin(Admin $admin){
        session()->put('admin',$admin);
    }

    public static function getAdmin(){
        return session()->get('admin'); 
    }
}
