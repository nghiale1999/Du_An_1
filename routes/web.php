<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix'=>'frontend',
    'namespace'=>'frontend',
    ],function(){
        
    Route::get('/register','RegisterController@index');
    Route::post('/register','RegisterController@store');

        
    Route::get('/login','LoginController@index');
    Route::post('/login','LoginController@login');

    Route::get('/blog','FeBlogController@GetBlog');
       
    Route::get('/blogsingle/{id}','FeBlogController@GetBlogSingle');
    Route::post('/blogsingle/{id}','FeBlogController@SaveComment');
        
    Route::post('/blog/ajax','FeBlogController@rate');

    Route::get('/account','AccountController@GetAccount');
    Route::post('/account','AccountController@PostAccount');
        
    Route::get('/product','ProductController@GetProduct');

    Route::get('/addproduct','ProductController@GetAddProduct');
    Route::post('/addproduct','ProductController@PostAddProduct');

    Route::get('/prodouct/delete/{id}','ProductController@DeleteProduct');

    Route::get('/prodouct/edit/{id}','ProductController@GetEditProduct');
    Route::post('/prodouct/edit/{id}','ProductController@EditProduct');

    Route::get('/homeproduct','ProductController@HomeProduct');


    Route::get('/productdetail/{id}','ProductController@DetailProduct');

    Route::get('/cart','CartController@GetCart');
    Route::post('/addcart','CartController@AddCart');

    Route::post('/deletecart','CartController@DeleteCart');
    Route::post('/downcart','CartController@DownCart');
    Route::post('/upcart','CartController@UpCart');


    Route::get('/support','MailController@Getmail');
    Route::post('/support','MailController@seedmail');

    Route::post('/search','ProductController@Search');
   
   

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix'=>'admin',
    'namespace'=>'admin',
    ],function(){
        Route::get('/dashboard','DashboardController@GetDashboard');

        Route::get('/profile','ProfileController@GetProfile');
        Route::post('/profile','ProfileController@PostProfile');

        Route::get('/country','CountryController@GetCountry');
        Route::get('/country/delete/{id}','CountryController@GetDelete');

        Route::get('/country/add','CountryController@GetAdd');
        Route::post('/country/add','CountryController@PostAdd');

        Route::get('/blog','BlogController@GetBolg');
        Route::get('/blog/delete/{id}','BlogController@GetDelete');

        Route::get('/blog/add','BlogController@GetAdd');
        Route::post('/blog/add','BlogController@PostAdd');

        Route::get('/blog/edit/{id}','BlogController@GetEdit');
        Route::post('/blog/edit/{id}','BlogController@PostEdit');

        Route::get('/qluser','QluserController@Qluser');

        Route::get('/qluser/delete/{id}','QluserController@DeleteUser');

        Route::get('/qluser/warning/{id}','QluserController@warning');

        Route::post('/qluser/warning/{id}','QluserController@PostWarning');

    });









