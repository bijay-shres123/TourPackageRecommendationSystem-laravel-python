<?php

namespace App\Http\Controllers;

use App\ProductReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class ProductReviewController extends Controller
{
    protected $user_reviews=null;
    public function __construct(productReview $_user_reviews){
        $this->user_reviews=$_user_reviews;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->user_reviews->get();
       return view('backend.product-reviews')->with('reviews_data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ProductReview $_user_reviews)
    {
        $this->user_reviews=$_user_reviews;
        // dd($this->user_reviews->all());
        $review_validator[]=$this->user_reviews->all();
     
        foreach($review_validator as $value){
            foreach($value as $new_value){
            
            $unique_code[] =$new_value->user_id *$new_value->tour_packages_id;
           
            
        }
    }
  

      $values[] = $request->all();
      foreach($values as $value){
     
            $unique_code_2 = $value['user_id']*$value['tour_packages_id'];
      
    }
 
    
    // // dd($unique_code_2);
    // foreach($unique_code as $x1){
    //     echo   $x1;
    // }
    // dd($unique_code);
      

    
       
        if ($unique_code_2) {
           foreach($unique_code as $x1){ 
              if( $x1==$unique_code_2){
                $request->session()->flash('message','You have already reviewd the product');
                return back();
              }
            }
                        
         }
         
            auth()->user()->review()->create($request->all());
            return back();
       
        // auth()->user()->review()->create($request->all());

        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $productReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $productReview)
    {
        //
    }
}
