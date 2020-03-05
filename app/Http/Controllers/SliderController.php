<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\User;
use File;

class SliderController extends Controller
{
    protected $slider=null;
    public function __construct(Slider $_slider){
        $this->slider=$_slider;
    }
    public function index(){
        $data=$this->slider->get();
        return view('backend.slider')->with('slider_data',$data);

    }

    public function UserIndex(){
        $data=User::all();
        return view('backend.User-Details')->with('user_data',$data);

    }


    public function getSliderForm(Request $request){

        $act=($request->id=='post') ? 'add':'update';
        if($act!=='add'){
            $this->slider=$this->slider->find($request->id);
            if(!$this->slider){
                $request->session()->flash('success','Slider not found');
                return redirect()->route('slider-list');
            }
        }

        return view ('backend.slider-form')
        ->with('title',$act)
        ->with('slider_data',$this->slider);
    }

    public function submitSlider(Request $request){
         
        $act="add";
        if(isset($request->slider_id) && $request->slider_id !=null){
            $act="updat";
            $this->slider=$this->slider->find($request->slider_id);

        }
        $rules=$this->slider->getAddRules();

        $request->validate($rules);
        
        $success=$this->slider->addSlider($request);
             if($success){
                 $request->session()->flash('success','Slider '.$act.'ed successfully');
             }else{
                $request->session()->flash('sorry','Slider could not '.$act.'ed');
             }
             return redirect()->route('slider-list');
    }
   public function deleteSlider(Request $request){
       $this->slider=$this->slider->find($request->slider_id);
       
       if(!$this->slider){
           $request->session()->flash('error','Slider not found');
           return redirect()->route('slider-list');
       }
       $slider_image=$this->slider->image;
       $del=$this->slider->delete();
       if($del){
           if(file_exists(public_path().'/uploads/slider/'.$slider_image)){
               unlink(public_path().'/uploads/slider/'.$slider_image);
           }
           $request->session()->flash('success','Slider delete successfully');   
       }else{
        $request->session()->flash('error','Sorry! There is problem');
       }
       return redirect()->route('slider-list');   
   }


}
