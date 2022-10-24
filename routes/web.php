<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\QueriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\InfoReservation;

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




Route::get('/', function(){

    //  return redirect()->route('Queries.Vols');
     return redirect()->route('Queries.Vols');
});




Route::group(['middleware' => ['Admin','auth']],function(){
    //CG
    Route::get('/AddForm_CG', [MyController::class,'AddForm_CG'])->name('AddForm_CG'); //AddForm_Congret
    Route::post('/sendForm_CG', [MyController::class,'sendForm_CG'])->name('sendForm_CG');

    Route::get('/EditForm_CG/{id}', [MyController::class,'EditForm_CG'])->name('EditForm_CG');
    Route::post('/EditForm_CG/{id}',[MyController::class,'UpdateForm_CG'])->name('UpdateForm_CG');


    //WC
    Route::get('/AddForm_WC', [MyController::class,'AddForm_WC'])->name('AddForm_WC');
    Route::post('/sendForm_WC', [MyController::class,'sendForm_WC'])->name('sendForm_WC');

    Route::get('/Show_CG/{id}', [MyController::class,'Show_CG'])->name('Show_CG');

    Route::get('/EditForm_WC/{id}', [MyController::class,'EditForm_WC'])->name('EditForm_WC');
    Route::post('/EditForm_WC/{id}',[MyController::class,'UpdateForm_WC'])->name('UpdateForm_WC');



    Route::get('/Fonction', [MyController::class,'Fonction']);
    Route::post('/AddFonction', [MyController::class,'AddFonction'])->name('AddFonction');


    Route::get('/Facture_CG/{id}', [MyController::class,'Facture_CG'])->name('Facture_CG');
    Route::get('/Facture_WC/{id}', [MyController::class,'Facture_WC'])->name('Facture_WC');




});


Route::middleware(['middleware' => 'auth'])->name('Queries.')->prefix('Queries')->group(function () {
    //Vols




    // Route::get('/VolsAllDate', function(){
    //     $aaa=Db::table('AllVols_view')->get() ;
    //     dd($aaa);

    // });



    Route::get('/VolsAllDate', [QueriesController::class,'VolsAllDate'])->name('VolsAllDate');
    Route::post('/VolsAllDate', [QueriesController::class,'VolsAllDate'])->name('SearchVolsAll');

    // Route::get('/Transport', [QueriesController::class,'Transport'])->name('Transport');

    Route::get('/Vols', [QueriesController::class,'Vols'])->name('Vols');
    Route::post('/Vols', [QueriesController::class,'SearchVol'])->name('SearchVol');

    Route::get('/isHere', [QueriesController::class,'isHere'])->name('isHere');

    //Reservation
    Route::get('/Reservation_CG', [QueriesController::class,'Reservation_CG'])->name('Reservation_CG');
    Route::get('/Reservation_WC', [QueriesController::class,'Reservation_WC'])->name('Reservation_WC');

    Route::get('/Compagnons', [QueriesController::class,'Compagnons'])->name('Compagnons');
    Route::get('/Participants', [QueriesController::class,'Participants'])->name('Participants');

        Route::group(
            ['middleware'=>'Admin'],function(){

                Route::get('/DeleteP_CG/{id}', [QueriesController::class,'DeleteP_CG'])->name('DeleteP_CG');
                Route::get('/DeleteP_WC/{id}', [QueriesController::class,'DeleteP_WC'])->name('DeleteP_WC');

            Route::get('/BadgeParticipant/{id}', [QueriesController::class,'BadgeParticipant'])->name('BadgeParticipant');
         Route::get('/BadgeCompagnon/{id}', [QueriesController::class,'BadgeComp'])->name('BadgeComp');
         Route::get('/Badge_WC/{id}', [QueriesController::class,'Badge_WC'])->name('Badge_WC');
         Route::get('/printAll', [QueriesController::class,'printAll'])->name('printAll');

        });





    //Cup
    Route::get('/Coupe', [QueriesController::class,'Coupe'])->name('Coupe');


    // Route::post('/Reservation', [QueriesController::class,'Reservation'])->name('SearcReservation');

    // Route::get('/Reservation',
    // function(){
    //     return InfoReservation::all()->groupBy('City')->groupBy('Type');
    // }

    // )->name('Reservation');
    // Route::get('/Hotel', [QueriesController::class,'Hotel'])->name('Hotel');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
        // return view('dashboard');
    })->name('dashboard');
});
