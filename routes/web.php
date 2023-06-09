<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\SmsApiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/upload',[FileUploadController::class,'fileupload'])->name('upload');
Route::get('/upload1',[FileUploadController::class,'homeer'])->name('homer');
Route::get('/show',[FileUploadController::class,'getFile'])->name('show');
Route::get('/',[FileUploadController::class,'home'])->name('hmm');
Route::get('/downlod/{id}',[FileUploadController::class,'downloadfile'])->name('t.downfile');
Route::get('/show',[FileUploadController::class,'getFile'])->name('show');
Route::get('/show-user',[FileUploadController::class,'getFileUser'])->name('show-user');


Route::post('/store',[FileUploadController::class,'store'])->name('reg.store');
Route::get('/delete/{id}',[FileUploadController::class,'deletefile'])->name('f.del');
Route::get('/sms',[SmsApiController::class,'smssend'])->name('Sms');


Route::get('/smssends',[SmsApiController::class,'smsqeueapi'])->name('s.smsapi');




// Route::get('/files', [FileUploadController::class,'index'])->name('files.index');
//         Route::get('/files/add', [FileUploadController::class,'create'])->name('files.create');
//         Route::post('/files/add', [FileUploadController::class,'store'])->name('files.store');