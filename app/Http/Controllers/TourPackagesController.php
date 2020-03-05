<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\TourPackages;
use App\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use File;

class TourPackagesController extends Controller
{
    protected $tour_package = null;
    protected $our_packag = null;
    public function __construct(TourPackages $_tourpackage)
    {
        $this->tour_package = $_tourpackage;
    }
    public function index()
    {

        $data = $this->tour_package->get();

        return view('backend.tourpackages.index')->with('tour_package_data', $data);
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function addToCart($id)
    {
        $product = TourPackages::find($id);

        if (!$product) {

            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->package_price,
                    "photo" => $product->image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->title,
            "quantity" => 1,
            "price" => $product->package_price,
            "photo" => $product->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {


                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }


    public function getTouristPackageForm(Request $request)
    {

        // dd($request->id)->show();
        $act = ($request->id == 'post') ? 'add' : 'update';
        if ($act !== 'add') {
            $this->tour_package = $this->tour_package->find($request->id);
            if (!$this->tour_package) {
                $request->session()->flash('success', 'Tour Package not found');
                return redirect()->route('tourpackage-list');
            }
        }
        return view('backend.tourpackages.tourpackageform')
            ->with('title', $act)
            ->with('tourpackage_data', $this->tour_package);
    }

    public function submitTouristPackage(Request $request)
    {



        $act = "add";
        if (isset($request->id) && $request->id != null) {
            $act = "updat";
            $this->tour_package = $this->tour_package->find($request->id);
        }

        $success = $this->tour_package->addTourPackage($request);
        if ($success) {
            $request->session()->flash('success', 'Tour Package ' . $act . 'ed successfully');
        } else {
            $request->session()->flash('sorry', 'Tour Package could not ' . $act . 'ed');
        }
        return redirect()->route('tourpackage-list');
    }

    public function deletetourpackage(Request $request)
    {


        //dd($request)->show();
        $this->touristPackage = $this->tour_package->find($request->id);

        if (!$this->touristPackage) {
            $request->session()->flash('error', 'Tourist Package not found');
            return redirect()->route('tourpackage-list');
        }
        $touristpackage_image = $this->touristPackage->image;
        $del = $this->touristPackage->delete();
        if ($del) {
            if (file_exists(public_path() . '/uploads/TourPackage/' . $touristpackage_image)) {
                unlink(public_path() . '/uploads/TourPackage/' . $touristpackage_image);
            }
            $request->session()->flash('success', 'TourPackage delete successfully');
        } else {
            $request->session()->flash('error', 'Sorry! There is problem');
        }
        return redirect()->route('tourpackage-list');
    }
    //test Purpose


    //FOR FRONTEND VIEWS
    public function frontendViewTourPackages()
    {
        $data = $this->tour_package->paginate(6);
        return view('frontend.tourpackages')->with('tourpackage_data', $data);
    }

    public function frontendViewTourPackagesSingle(Request $request, TourPackages $_tourpackage, Recommendation $_recommendation, Article $_article)
    {

        $article_data = DB::table('articles')->orderBy('id', 'desc')->get();

        $our_package = $_tourpackage->find($request->id);
        //$recomm_title = $_tourpackage->getRecommendation();

        $recomm_titles = Recommendation::All()->where('tour_packages_id', $our_package->title)->toArray();
        // dd($recomm_title);

        //RECOMMENDATION KO LAGI DATA
        $data_for_recommendation = $_recommendation->getTourPackageData();
        // CHECKED WORKING
        // foreach($data_for_recommendation as $object){

        //     foreach ($object as $value){
        //     echo $value['title'] ;
        // }
        // }
        //ENDING HERE

        //     // $recomm_title = $_tourpackage->getRecommendation()->tour_packages_id;
        //     // dd($recomm_title);
        //     // if($our_package==)
        //     dd($our_package->title);
        //    dd($_tourpackage->getRecommendation());


        // $count = $_tourpackage->reviews()->count();
        $new_id =  $request->id;
        // return view('frontend.SingleTourPackage')->with('tourpackage_data',$this->tour_package->find($request->id));
        $count = DB::table('product_reviews')->get()->where('tour_packages_id',  $new_id)->count();

        if (empty($count)) {
            return view('frontend.SingleTourPackage')->with('tourpackage_data', $this->tour_package->find($request->id)->with('recommendation_titles', $recomm_titles)->with('recommendation_datas', $data_for_recommendation)->with('articles_datas', $article_data));
        }
        $starCountSum = DB::table('product_reviews')->get()->where('tour_packages_id',  $new_id)->sum('rating');
        $average = $starCountSum / $count;

        // dd( $this->tour_package->getStarRating());
        $data = $this->tour_package->find($request->id);
        $data['count'] = $count;
        $data['average'] = round($average);
        return view('frontend.SingleTourPackage')->with('tourpackage_data', $data)->with('recommendation_titles', $recomm_titles)->with('recommendation_datas', $data_for_recommendation)->with('articles_datas', $article_data);
        //dd($data);
        //$this->touristPackage=$this->tour_package->find($request->id);

        //  return view('frontend.SingleTourPackage')->with('tourpackage_data',$data);



    }

    public function SearchIndex(Request $request)
    {
        $q = $request->get('q');
        if ($q !== 0) {
            $tourpackages = TourPackages::where('title', 'LIKE', '%' . $q . '%')->get();

            if (count($tourpackages) > 0) {
                return view('frontend.search-list')->with('tourpackagesresult', $tourpackages)->withQuery($q);
            }
        }
        return  view('frontend.search-list')->withMessage('No TourPackages Found');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TourPackages  $tourPackages
     * @return \Illuminate\Http\Response
     */
    public function show(TourPackages $tourPackages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TourPackages  $tourPackages
     * @return \Illuminate\Http\Response
     */
    public function edit(TourPackages $tourPackages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TourPackages  $tourPackages
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, TourPackages $tourPackages)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TourPackages  $tourPackages
     * @return \Illuminate\Http\Response
     */
    public function destroy(TourPackages $tourPackages)
    {
        //
    }
}
