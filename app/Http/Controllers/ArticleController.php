<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use File;

class ArticleController extends Controller
{
    protected $article=null;
    public function __construct(Article $_article){
        $this->article=$_article;
    }
    public function index(){
        $data=$this->article->get();
        return view('backend.article')->with('article_data',$data);

    }
    public function getArticleForm(Request $request){

        $act=($request->id=='post') ? 'add':'update';
        if($act!=='add'){
            $this->article=$this->article->find($request->id);
            if(!$this->article){
                $request->session()->flash('success','Article not found');
                return redirect()->route('article-list');
            }
        }

        return view ('backend.article-form')
        ->with('title',$act)
        ->with('article_data',$this->article);
    }

    public function submitArticle(Request $request){
         
        // dd($request->id);
        $act="add";
        if(isset($request->id) && $request->id !=null){
            $act="updat";
            $this->article=$this->article->find($request->id);

        }
        // dd($request->id)->show();
        //$rules=$this->article->getAddRules();

        // $request->validate($rules);
        
        $success=$this->article->addArticle($request);
             if($success){
                 $request->session()->flash('success','Article '.$act.'ed successfully');
             }else{
                $request->session()->flash('sorry','Article could not '.$act.'ed');
             }
             return redirect()->route('article-list');
    }
   public function deleteArticle(Request $request){
       $this->article=$this->article->find($request->article_id);
       
       if(!$this->article){
           $request->session()->flash('error','Article not found');
           return redirect()->route('article-list');
       }
       $article_image=$this->article->image;
       $del=$this->article->delete();
       if($del){
           if(file_exists(public_path().'/uploads/article/'.$article_image)){
               unlink(public_path().'/uploads/article/'.$article_image);
           }
           $request->session()->flash('success','Article delete successfully');   
       }else{
        $request->session()->flash('error','Sorry! There is problem');
       }
       return redirect()->route('article-list');   
   }


}
