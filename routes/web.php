<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//FRONTEND ROUTES



Route::get('/','FrontendController@index') ->name('site-home');
Route::get('/article-list','FrontendController@getArticleindex')->name('front-article-list');
Route::get('/article-list/{id}','FrontendController@getArticleSingle')->name('front-article-single');
Route::get('/tourpackages','TourPackagesController@frontendViewTourPackages')->name('front-tourpackages-list');

Route::get('/recommendation','RecommendationController@index')->name('recommendation-list');
Route::post('/search','TourPackagesController@SearchIndex')->name('search-result');

Route::get('cart', 'TourPackagesController@cart');
 
Route::get('add-to-cart/{id}', 'TourPackagesController@addToCart');
Route::delete('remove-from-cart', 'TourPackagesController@remove');
Route::patch('update-cart', 'TourPackagesController@update');
 

Route::group(['prefix'=>'/tourpackages'], function(){
    Route::get('/','TourPackagesController@frontendViewTourPackages')->name('front-tourpackages-list');
    Route::get('/{id}','TourPackagesController@frontendViewTourPackagesSingle')->name('front-tourpackages-single');
});



Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'PackageBookController@index')->name('user-home');
    Route::get('/delete/{bookpackage_id}','PackageBookController@deletePackageBooked')->name('bookedPackage-delete');
});

// Route::get('/home', 'PackageBookController@index')->name('home');
// Route::get('/delete/{bookpackage_id}','PackageBookController@deletePackageBooked')->name('bookedPackage-delete');

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Route::any('/',function(){
        return view ('home');
    })->name('admin');

    Route::group(['prefix'=>'/slider'], function(){

        Route::get('/','SliderController@index')->name('slider-list');
        Route::get('/{id}','SliderController@getSliderForm')->name('slider-edit');
        Route::get('/post','SliderController@getSliderForm')->name('slider-post');
        Route::post('/post','SliderController@submitSlider')->name('slider-submit');
        Route::get('/delete/{slider_id}','SliderController@deleteSlider')->name('slider-delete');
    });

    Route::group(['prefix'=>'/article'],function(){
   
        Route::get('/','ArticleController@index')->name('article-list');
        Route::get('/{id}','ArticleController@getArticleForm')->name('article-edit');
        Route::get('/post','ArticleController@getArticleForm')->name('article-post');
        Route::post('/post','ArticleController@submitArticle')->name('article-submit');
        Route::get('/delete/{article_id}','ArticleController@deleteArticle')->name('article-delete');

    });
    Route::group(['prefix'=>'/tourpackages'],function(){
   
        Route::get('/','TourPackagesController@index')->name('tourpackage-list');
        Route::get('/{id}','TourPackagesController@getTouristPackageForm')->name('tourpackage-edit');
        Route::get('/post','TourPackagesController@getTouristPackageForm')->name('tourpackage-post');
        Route::post('/post','TourPackagesController@submitTouristPackage')->name('tourpackage-submit');
        Route::get('/delete/{id}','TourPackagesController@deletetourpackage')->name('tourpackage-delete');

    });
    Route::group(['prefix'=>'/product-reviews'],function(){
   
        Route::get('/','ProductReviewController@index')->name('product-reviews-list');
       

    });
    Route::group(['prefix'=>'/booked-packages'],function(){
   
        Route::get('/','PackageBookController@backendindex')->name('booked-package-list');
        Route::get('/delete/{bookpackage_id}','PackageBookController@deletePackageBookedBackend')->name('backend-bookedPackage-delete');

    });
    Route::get('/users','SliderController@UserIndex')->name('user-details');
});

Route::group(['prefix'=>'/vendor'],function(){
    Route::get('/',function(){
        return view('home');
    })->name('vendor');
});
Route::resource('review','ProductReviewController');
Route::resource('bookpackage','PackageBookController');
Route::group(['prefix'=>'/customer'],function(){
    Route::any('/{id}',function(){
        return view ('frontend.customerOrders');
    })->name('customer');
    // Route::resource('review','ProductReviewController');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/autocomplete', 'AutocompleteController@index');
Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');




