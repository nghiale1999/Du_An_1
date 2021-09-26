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

    });









