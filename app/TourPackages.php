<?php

namespace App;

use App\Recommendation;
use App\Models\Article;
use App\Http\Controllers\ProductReviewController;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class TourPackages extends Model
{
    public $table = "_tour_packages";
    protected $fillable = ['id', 'title', 'date', 'link', 'image', 'meal_inclusion', 'transport_facilities', 'Days_Nights', 'Inclusion_Exclusion_list', 'Detailed_itinerary', 'package_price'];
    public function getAddRules()
    {
        return [
            'id' => 'id|required',
            'title' => 'required|string',
            'link' => 'required|url',
            'image' => 'sometimes|image|max:3000',
            'meal_inclusion' => 'required',
            'transport_facilities' => 'required',
            'Days_Nights' => 'required',
            'Inclusion_Exclusion_list' => 'required',
            'date' => 'required|string',
            'Detailed_itinerary' => 'required',
            'package_price' => 'required',

        ];
    }
    public function addTourPackage($request)
    {

        $data = $request->except('_token');
        if ($request->has('image')) {
            $path = base_path('/public/uploads/TourPackage/');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $ext = $request->image->getClientOriginalExtension();
            $file_name = "STourPackage-" . date('Ymdhis') . rand(0, 9) . "." . $ext;
            $success = $request->image->move($path, $file_name);
            if ($success) {
                $data['image'] = $file_name;
                if ($this->image != null && file_exists(public_path() . '/uploads/TourPackage/' . $this->image)) {
                    unlink(public_path().'/uploads/TourPackage/'.$this->image);
                    
                }
            }
        }
        $data['added_by'] = $request->user()->id;
        $this->fill($data);
        return $this->save();
    }
    public function provideTourPackage($request)
    {
        $data = $request->except('_token');
        return $data;
    }
    
      public function reviews()
    {
        return $this->hasMany(ProductReview::class);
     }

     public function getStarRating(TourPackages $_tourpackage)
     {
         
         $count = $this->_tourpackage;
        // $test=DB::table('product_reviews')->get();
        
        // dd($test->count());
        // $required_package_id= $request->id;
        // dd($request);
        // $count = DB::table('product_reviews')->get()->where('tour_packages_id',)->count();
        //$count = $this->reviews()->count();
        
        // if(empty($count)){
        //     return 0;
        // }
        // $starCountSum=$this->reviews()->sum('rating');
        // $average=$starCountSum/ $count;

       return $count;
 
     }
     public function recommendations()
    {
        return $this->belongsToMany('App\Recommendation');
    }
    public function getRecommendation(){
        $required_recommendations = Recommendation::all();
        
        return($required_recommendations);
    //     foreach ($required_recommendations->recommendations as $recommendations) {
    //     dd($recommendations);
    // }
    }
    public function articles(){
        return $this->belongsToMany('App\Models\Article');
    }
}
