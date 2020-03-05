<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\TourPackages;
use DB;

class FrontendController extends Controller
{
    protected $tour_package = null;
    protected $article=null;
    public function __construct(Article $_article){
        $this->article=$_article;
    }
    protected $tourpackage = null;

 
    
    public function index()
    {
       

        return view('welcome');
        
    }
    public function getArticleindex(){
        // $data=$this->article->paginate();
        $data = DB::table('articles')->orderBy('id', 'desc')->paginate(4);
      
        return view('frontend.article-list')->with('article_data',$data);
    }
    public function getArticleSingle(Request $request){
        $new_data = $this->article->paginate(3);
        $data=$this->article->find($request->id);
        return view('frontend.article-single')->with('article_data',$data)->with('new_data',$new_data);
    }
//     public function frontendViewTourPackagesSingle(TourPackages $_tourPackages,Request $request){
//        $_tourPackages->getStarRating();
//         $this->tourpackage =$_tourPackages;
//         $tourpackage = DB::table('_tour_packages')->get()->where('id', $request->id);
        
//          $data=$tourpackage;

//         //  dd($data->image);
       
//           return view('frontend.SingleTourPackage')->with('tourpackage_data', $data);
        
//         //     //$this->touristPackage=$this->tour_package->find($request->id);
        
//         //     //  return view('frontend.SingleTourPackage')->with('tourpackage_data',$data);
           
            
    
//         // }
// }
}