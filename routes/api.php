<?php


use App\models\artikel;
use App\models\kategoriartikel;
use App\models\berita;
use App\models\kategoriberita;
use App\models\galeri;
use App\models\kategorigaleri;
use App\models\pengumuman;
use App\models\kategoripengumuman;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\controllers\AuthApiController@login');
    Route::post('logout', 'App\Http\controllers\AuthApiController@logout');
    Route::post('refresh', 'App\Http\controllers\AuthApiController@refresh');
    Route::post('me', 'App\Http\controllers\AuthApiController@me');

});

route::apiResource( 'artikel', App\Http\Controllers\artikelAPIController::class );
route::apiResource( 'kategoriartikel', App\Http\Controllers\kategoriartikelAPIController::class );
route::apiResource( 'berita', App\Http\Controllers\beritaAPIController::class );
route::apiResource( 'kategoriberita', App\Http\Controllers\kategoriberitaAPIController::class );
route::apiResource( 'galeri', App\Http\Controllers\galeriAPIController::class );
route::apiResource( 'kategorigaleri', App\Http\Controllers\kategorigaleriAPIController::class );
route::apiResource( 'pengumuman', App\Http\Controllers\pengumumanAPIController::class );
route::apiResource( 'kategoripengumuman', App\Http\Controllers\kategoripengumumanAPIController::class );

route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

//soal1
//Tampilkan artikel dengan id=17 dan users_id=160
Route::get('soal1','App\Http\Controllers\BabSatuController@a1');

//soal2
//Tampilkan artikel dengan id=2 dan users_id=5
Route::get('soal2','App\Http\Controllers\BabSatuController@a2');

//soal3
//Tampilkan artikel dengan id=3 dan user dengan nama=Aslijan megantara
Route::post('soal3','App\Http\Controllers\BabSatuController@a3');

//soal4
//Tampilkan pengumuman yang dibuat oleh user yang membuat galeri dengan galeri id=269 
Route::get('soal4','App\Http\Controllers\BabSatuController@a4');

//soal5
//Tampilkan pengumuman yang dibuat oleh user yang membuat galeri dengan nama kategori galeri  yang diawali dengan Aut 
Route::get('soal5','App\Http\Controllers\BabDuaController@a5');

//soal6
//Tampilkan pengumuman yang dibuat oleh user yang membuat galeri dan juga membuat berita 
Route::get('soal6','AppHttp\\Controllers\BabDuaController@a6');

//soal7
//Tampilkan pengumuman yang dibuat oleh user yang membuat 2 berita atau lebih
Route::get('soal7','App\Http\Controllers\BabDuaController@a7');