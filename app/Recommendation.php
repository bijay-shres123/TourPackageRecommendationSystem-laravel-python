<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $recommendation=null;
    public function recommendations()
    {
        return $this->belongsToMany('App\TourPackages');
    }
     public function getTourPackageData(){
        $datas=DB::table('recommendations')->pluck('tour_packages_id');
        $only_titles = []; 
        foreach ($datas as $data) {
            $only_titles[] = $data;
        }
       
        $recomm_data = [];
        foreach($only_titles as $value){
        $recomm_data[] = TourPackages::get()->where('title',$value);
        }

        
        return $recomm_data;
    }
   
}
