<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;

class Slider extends Model
{
    protected $fillable=['title','slogan','link','image','added_by'];
    public function getAddRules(){
        return[
            'title'=>'required|string',
            'slogan'=>'required|string',
            'link'=>'required|url',
            'image'=>'sometimes|image|max:3000'
        ];
    }
    public function addSlider($request){
        $data=$request->except('_token');
        if($request->has('image')){
            $path=base_path('/public/uploads/slider');
            if(!File::exists($path)){
                File::makeDirectory($path, 0777,true,true);
            }

            $ext=$request->image->getClientOriginalExtension();
            $file_name="Slider-".date('Ymdhis').rand(0,9).".".$ext;
            $success=$request->image->move($path, $file_name);
            if($success){
                $data['image']=$file_name;
                if($this->image !=null && file_exists(public_path().'/uploads/slider/'.$this->image) ){
                    unlink(public_path().'/uploads/slider/'.$this->image);
                }
            }

        }
            $data['added_by']=$request->user()->id;
             $this->fill($data);
             return $this->save();
    }
}
