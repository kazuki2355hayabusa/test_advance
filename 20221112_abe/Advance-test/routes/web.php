<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',function() {
    $datas = [
            'firstName' => '',
            'lastName' => '',
            'sex' => '',
            'sex_code' =>'1',
            'email' => '',
            'zipcode' => '',
            'address' => '',
            'buildings' => '',
            'opinion'=> '',

            ];
    return view('index',$datas);
});

Route::post('/check',[InquiryController::class,'check']);
Route::post('/register',[InquiryController::class,'register']);
Route::get('/back',[InquiryController::class,'back']);



Route::get('/management',[InquiryController::class,'management']);
Route::post('/search', [InquiryController::class, 'search']);
Route::get('/search', [InquiryController::class, 'search']);

Route::post('/delete',[InquiryController::class,'delete']);



