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




Auth::routes();

Route::get('/galeria', 'HomeController@galery')->name('galery');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'HomeController@admin')->name('adminHome')->middleware('auth');;

//Blog routes
Route::get('/admin/blog', 'BlogController@adminBlog')->name('adminBlog')->middleware('auth');;
Route::resource('blog', 'BlogController')->parameters([
    'blog' => 'slug'
]);



//Services routes

Route::get('/admin/uslugi', 'ServiceController@adminService')->name('adminService')->middleware('auth');;
Route::resource('uslugi', 'ServiceController')->parameters([
    'usługi' => 'slug'
])->except(['show']);


//Specialist routes
Route::get('/admin/specjalisci', 'SpecialistController@adminSpecialist')->name('adminSpecialist')->middleware('auth');;
Route::resource('specjalisci', 'SpecialistController')->parameters([
    'specjalisci' => 'slug'
]);

//Posts routes
Route::get('/admin/aktualnosci', 'PostController@adminPost')->name('adminPost')->middleware('auth');;
Route::resource('aktualnosci', 'PostController')->parameters([
    'aktualnosci' => 'slug'
]);

//Tags routes
Route::get('/admin/tagi', 'TagController@adminTag')->name('adminTag')->middleware('auth');;
Route::resource('tagi', 'TagController')->parameters([
    'tagi' => 'slug'
])->middleware('auth');;

//Info routes
Route::get('/admin/info', 'InfoController@adminInfo')->name('adminInfo')->middleware('auth');;
Route::resource('info', 'InfoController')->only(['update'])->middleware('auth');;

//Partner routes
Route::get('/admin/partnerzy', 'PartnerController@adminPartner')->name('adminPartner')->middleware('auth');;
Route::resource('partnerzy', 'PartnerController')->only(['update'])->middleware('auth');;




Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/admin/pliki',  function () {
    return view('admin.files.index');
})->name('adminFiles')->middleware('auth');

Route::get('/kontakt',  function () {
    return view('pages._contact');
})->name('contact');

Route::get('/{slug}', 'ServiceController@show')->name('uslugi.show');



Route::post('/setCookie', 'CookiesController@addCookies')->name('test');


