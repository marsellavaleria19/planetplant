<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function addCart($cart,$qty,$item){

        if(!$cart){
            return session()->put('cart',$cart);
        }

        if(isset($cart[$item->id])){
            $cart[$item->id]["jumlah"]+=$qty;
            $cart[$item->id]["subtotal"]=$qty*$item->totalprice;
            return session()->put('cart',$cart);
        }

        $jumlahBarang+= $request->qty;
        return session()->put('cart',$cart);    
    }

    public function countKuantiti($cart,$qty){
        $jumlahBarang = session()->get('kuantiti');
        if(!$cart){
            $jumlahBarang+=$qty;
            return session()->put('kuantiti',$jumlahBarang);
        }

        if(isset($cart[$item->id])){
            $jumlahBarang+= $qty;
            return session()->put('kuantiti',$jumlahBarang);
            return session()->put('cart',$cart);
        }

        $jumlahBarang+= $qty;
        return session()->put('kuantiti',$jumlahBarang);
    }
    
}
