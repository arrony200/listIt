<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    // public function featured(){
    //     $this->belongsTo( Media::class,'featured_media_id');
    // }

    public function location(){
        return $this->belongsTo( Location::class,'location_id');
    }

    public function gallery(){
       return $this->hasMany( Media::class,'property_id');
    }

    public function dynamic_pricing($price){
       $current_currency = Cookie::get('currency','euro');
       if($current_currency == 'usd'){
            // $get = Http::get('https://freecurrencyapi.net/api/v2/latest?apikey=76c89170-6178-11ec-98f1-5f7ce0abde0a&base_currency=TRY');
            // if($get->successful()) {
            //     $usd = intval($euro * $get->json()['data']['USD']);
            //     return $usd . ' USD';
            // }

            return $price.' USD';
       }else{
         return $price.' EURO';
       }
    }

}
