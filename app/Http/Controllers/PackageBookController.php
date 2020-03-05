<?php

namespace App\Http\Controllers;

use App\PackageBook;
use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon;
use App\User;
class PackageBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $unique_code = null;
    protected $unique_code_2 = null;
     protected $package_booked = null;
     public function __construct(PackageBook $_package_booked)
    {
        $this->package_booked = $_package_booked;
     
    }

    //  public function getTotal(Request $request){
    //     $values[] = $request->all();
    //     foreach($values as $value){
       
    //          $user_id = $value['id'];
        
    //   }
    //   $package_prices = DB::table('package_books')->select('package_price')->where('user_id', $user_id);
    //  }
    public function index(Request $request)
    {
       //For ALL PACKAGE SUM

        $data=PackageBook::all();
        return view('frontend.userHome')->with('package_booked_data',$data);
    }
    public function backendindex(PackageBook $_package_booked)
    {
     $data_required = $this->package_booked->all();
            
            //get a carbon instance with created_at as date
            // foreach($data_required as $start){
            
            // $start_day[] = Carbon::parse($start->created_at);
            // $expiry_day = $start_day->addDays(3); //add X months to created_at date
            // }
            // foreach($start_day as $end){
            // $end_day[] = $end->addDays(4);
            // }
            // foreach($end_day as $expiration_date){
            // $required_date = $expiration_date['date'];
            
            // }
            
        PackageBook::where('expiration_date', '<', Carbon::now())->delete();
        $data=PackageBook::all();
        return view('backend.booked-packages')->with('package_booked_data',$data);
    }

    public function deletePackageBooked(Request $request){
        $booking_id = $request->bookpackage_id;
        $this->package_booked=DB::table('package_books')->where('id', $booking_id)->first();
       
       if(!$this->package_booked){
           $request->session()->flash('error','Your Package  not found');
           return redirect()->route('user-home');
       }
      
       $del=DB::table('package_books')->where('id',  $booking_id)->delete();
       if($del){
       return redirect()->route('user-home'); 
    }


   }
   public function deletePackageBookedBackend(Request $request,PackageBook $_package_booked){
           
    
    $booking_id = $request->bookpackage_id;
    $this->package_booked=DB::table('package_books')->where('id', $booking_id)->first();
   
   if(!$this->package_booked){
       $request->session()->flash('error','Your Package  not found');
       return redirect()->route('home');
   }
  
   $del=DB::table('package_books')->where('id',  $booking_id)->delete();
   if($del){
   return redirect()->route('booked-package-list'); 
   }
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
    public function store(Request $request,PackageBook $_package_booked)
    {
        $this->package_booked=$_package_booked;
        $rules=$this->package_booked->getAddRules();

        $success=$request->validate($rules);
        if(!$success){
            // $request->session()->withMessage('TourPackage  Unsuccessfull');
            return back()->withMessage('message, Unsuccessfull');
           
        }
        // dd($this->user_reviews->all());
        $booking_validator[]=DB::table('package_books')->get();
        
     
        foreach($booking_validator as $value){
            foreach($value as $new_value){
            
            $unique_code[] =$new_value->user_id *$new_value->tour_packages_id;
           
            
        }
        }
  
      $values[] = $request->all();
      foreach($values as $value){
     
            $unique_code_2 = $value['user_id']*$value['tour_packages_id'];
      
    }
    foreach($unique_code as $x1){ 
     
              if( $x1==$unique_code_2){
                $request->session()->flash('message','You have already Booked the Package');
                return back();
              }
            }
                        
        
        auth()->user()->book()->create($request->all());
        
        return redirect()->route('user-home'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackageBook  $packageBook
     * @return \Illuminate\Http\Response
     */
    public function show(PackageBook $packageBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageBook  $packageBook
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageBook $packageBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageBook  $packageBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageBook $packageBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageBook  $packageBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageBook $packageBook)
    {
        //
    }
}
