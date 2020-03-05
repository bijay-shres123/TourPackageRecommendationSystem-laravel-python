<?php

namespace App\Models;

use App\TourPackages;

use Illuminate\Database\Eloquent\Model;
use File;

class Article extends Model
{
    protected $fillable=['title','date','description','link','image','added_by'];
    public function getAddRules(){
        return[
            'title'=>'required|string',
            'date'=>'required|string',
            'description'=>'required',
            'link'=>'required|url',
            'image'=>'sometimes|image|max:3000'
        ];
    }
    public function addArticle($request){
        $data=$request->except('_token');
        if($request->has('image')){
            $path=base_path('/public/uploads/article');
            if(!File::exists($path)){
                File::makeDirectory($path, 0777,true,true);
            }

            $ext=$request->image->getClientOriginalExtension();
            $file_name="Article-".date('Ymdhis').rand(0,9).".".$ext;
            $success=$request->image->move($path, $file_name);
            if($success){
                $data['image']=$file_name;
                if($this->image !=null && file_exists(public_path().'/uploads/article/'.$this->image) ){
                    unlink(public_path().'/uploads/article/'.$this->image);
                }
            }

        }
            $data['added_by']=$request->user()->id;
             $this->fill($data);
             return $this->save();
    }
    public function Articles(){
        return $this->belongsToMany('App\TourPackages');
    }
}
