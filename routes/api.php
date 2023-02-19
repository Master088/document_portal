<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route::resource('document', DocumentController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/document/directory', [DocumentController::class, 'createFolder']);
    Route::post('/document/directory/root', [DocumentController::class, 'createRootFolder']);

    Route::get('/document/{left}', [DocumentController::class, 'getDocuments']);
    Route::get('/document/search/{id}', [DocumentController::class, 'searchDocuments']);


    Route::post('/document/file/upload', [DocumentController::class, 'uploadFile']);


    
    Route::patch('/document/directory/rename/{id}', [DocumentController::class, 'renameDirectory']);
    Route::patch('/document/file/rename/{id}', [DocumentController::class, 'renameFile']);

  

    


  

});



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
