<?php

use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\Public\ApartmentsController;

use App\Http\Controllers\Api\Private\ApartmentController;
use App\Http\Controllers\Api\Private\UploadController;
use App\Http\Controllers\Api\Public\MessageController;
use App\Http\Controllers\Api\Public\PlanController;
use App\Http\Controllers\Api\Public\ServiceController;
use App\Http\Controllers\Api\Public\ViewsController;
use GuzzleHttp\Client;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




//auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//upload routes

Route::post('/upload', [UploadController::class, 'upload']);

//message routes

Route::post('apartment/message', [MessageController::class , 'store']);

//public routes
Route::get('/apartments', [ApartmentsController::class, 'index']);
Route::get('/apartments/highlighted', [ApartmentsController::class, 'highlighted']);
Route::get('/apartments/{id}', [ApartmentsController::class, 'show']);
Route::get('apartments/search/advanced', [ApartmentsController::class, 'search']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/plans', [PlanController::class, 'index']);
Route::post('/view/{id}', [ViewsController::class, 'store']);
Route::get('/search/{query}', function ($query) {
    $client = new Client();
    $apiKey = env('TOM_TOM_KEY');
    //add api key
    $response = $client->request('GET', 'https://api.tomtom.com/search/2/search/'.$query.'.json?key='.$apiKey.'&typeahead=true&limit=5');

    return $response->getBody();
});

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //auth route
    Route::post('/logout', [AuthController::class, 'logout']);
    //apartment routes
    Route::get('/apartments/vendors/index', [ApartmentController::class, 'index']);
    Route::get('/apartments/vendors/{id}',[ApartmentController::class, 'show']);
    Route::post('/apartments/vendors/create', [ApartmentController::class, 'store']);
    Route::put('/apartments/vendors/update/{id}', [ApartmentController::class, 'update']);
    Route::delete('/apartments/vendors/delete/{id}', [ApartmentController::class, 'destroy']);
});
 