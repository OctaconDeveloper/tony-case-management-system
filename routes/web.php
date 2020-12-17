<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouteCompiler;

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

Route::get('/', [RouteController::class, 'login']);

Route::post('login', [AuthenticationController::class, 'login']);
Route::get('/error-403', [RouteController::class, 'error403']);

Route::get('/signin', [RouteController::class, 'login']);
Route::get('/viewnotice/{id}', [RouteController::class, 'viewnotice']);
Route::get('/viewcase/{id}', [RouteController::class, 'viewcase']);


Route::group(['middleware' => 'isUser'], function () {
    Route::get('/admin/dashboard', [RouteController::class, 'adminHome']);
    Route::get('logout', [AuthenticationController::class, 'logout']);
    Route::get('/admin/viewcourt', [RouteController::class, 'adminViewcourt']);
    Route::get('/admin/viewcasetype', [RouteController::class, 'adminViewcasetype']);
    Route::get('/settings', [RouteController::class, 'settings']);
    Route::post('/savepassword', [AuthenticationController::class, 'resetPassword']);
});

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/admin/newuser', [RouteController::class, 'adminNewuser']);
    Route::get('/admin/viewuser', [RouteController::class, 'adminViewuser']);
    Route::get('/admin/newcourt', [RouteController::class, 'adminNewcourt']);
    Route::get('/admin/viewcourt/{id}', [RouteController::class, 'adminViewSingleCourt']);
    Route::get('/admin/newcasetype', [RouteController::class, 'adminNewcasetype']);
    Route::post('/saveuser', [AuthenticationController::class, 'newuser']);
    Route::post('/savecourt', [GeneralController::class, 'savecourt']);
    Route::post('/savejudge', [GeneralController::class, 'savejudge']);
    Route::post('/saveuser', [AuthenticationController::class, 'newuser']); 
    Route::post('/savecasetype', [GeneralController::class, 'savecasetype']);
    Route::get('/deleteuser/{id}', [AuthenticationController::class, 'removeUser']);
    Route::get('/deletecourt/{id}', [GeneralController::class, 'removeCourt']);
    Route::get('/removejudge/{courtId}/{userId}', [GeneralController::class, 'removeCourtUser']);
    Route::get('/deletecasecategory/{id}', [GeneralController::class, 'removeCaseCategory']);
    
});


Route::group(['middleware' => 'isJudge'], function () {
    Route::get('/admin/viewmynotice', [RouteController::class, 'adminViewmynotice']);
    Route::get('/admin/viewmycourtcase', [RouteController::class, 'adminViewmycases']);
});

Route::group(['middleware' => 'isRegistrar'], function () {
    Route::get('/admin/newnotice', [RouteController::class, 'adminNewnotice']);
    Route::get('/admin/viewnotice', [RouteController::class, 'adminViewnotice']);
    Route::post('/savenotice', [GeneralController::class, 'savenotice']);
    Route::post('/addjudge', [GeneralController::class, 'addjudge']); 
    Route::get('/admin/newcourtcase', [RouteController::class, 'adminnNewcourtcase']);
    Route::get('/admin/viewcase', [RouteController::class, 'adminnViewcourtcase']);
    Route::post('/searchnotice', [GeneralController::class, 'searchnotice']);
    Route::post('/savecase', [GeneralController::class, 'savecase']);
    Route::post('/updatecase', [GeneralController::class, 'updatecase']);

    

});






