<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageBook extends Model
{
    protected $fillable=[
        'user_id',
        'user_name',
    
        'tour_packages_id',
        'tour_packages_name',
        'package_price',
        'no_of_peoples',
        'preferred_date',
        'phone_number',
        'status',
        'expiration_date',
        'enquiries'
    ];
    public function getAddRules(){
        return[
            'phone_number'=>'required|integer|min:10',
            'preferred_date'=> 'required|date|date_format:Y-m-d|after:today',
            'no_of_peoples'=>'required|integer|max:30'
            
        ];
    }
    
}
