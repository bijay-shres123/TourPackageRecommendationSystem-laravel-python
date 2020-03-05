<?php

namespace App\Http\Controllers;

use App\Recommendation;
use App\TourPackages;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    protected $recommendation=null;
    public function __construct(Recommendation $_recommendation){
        $this->recommendation=$_recommendation;
    }
    public function index(){
        $data=$this->recommendation->get();
       
       
        return view('frontend.recommendation')->with('recommendation_data',$data);


    }
    // public function getTourPackageData(Recommendation $_recommendation){
    //     $data=$this->recommendation->get();
        
    //     $recommendation_title = $data->toArray();
    //     foreach($recommendation_title as $value){
    //        $only_titles[] =  $value['tour_packages_id'];
    //     }
    //     // dd($only_titles);
    //     foreach($only_titles as $value){
    //     $recomm_data[] = TourPackages::get()->where('title',$value);
    //     }
    //     return $recomm_data;
    // }

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
    public function store(Request $request)
    {
        auth()->user()->book()->create($request->all());
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function show(Recommendation $recommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(Recommendation $recommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recommendation $recommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recommendation $recommendation)
    {
        //
    }
}
