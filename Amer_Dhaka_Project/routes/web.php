<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\commonController;
use App\Http\Controllers\GarbageController;
use App\Http\Controllers\GarbageShowController;
use App\Http\Controllers\IllegalstructureController;
use App\Http\Controllers\IllegalstructureShowController;
use App\Http\Controllers\MosquitoController;
use App\Http\Controllers\MosquitoShowController;
use App\Http\Controllers\RoadController;
use App\Http\Controllers\PersonalProfileController;
use App\Http\Controllers\PublictoiletController;
use App\Http\Controllers\PublictoiletShowController;
use App\Http\Controllers\RoadShowController;
use App\Http\Controllers\StreetLightController;
use App\Http\Controllers\StreetlightShowController;
use App\Models\Illegalstructure;
use App\Models\Mosquito;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[commonController::class, 'home'])->name('home');
Route::get('common/contactus',[commonController::class, 'contactUs'])->name('common.contactus');
Route::get('common/aboutus',[commonController::class, 'aboutUs'])->name('common.aboutus');


/////////////////////////Using Seeder//////////////////////////////////////////////////////
Route::get('get-districts/{division_id}', [PersonalProfileController::class, 'getDistrict']);
Route::get('get-thanas/{district_id}', [PersonalProfileController::class, 'getThana']);



Route::group(['prefix'=>'dashboard', 'middleware'=>'auth'], function(){
    Route::get('upload-photo', [PersonalProfileController::class, 'upload_photo']);
   
   Route::post('upload-photo', [PersonalProfileController::class, 'upload_photo']);
    Route::get('/',[BackendController::class, 'index'])->name('back.index');

    

   //-----------------------------------------Road Issue Functionality----------------------------------------------------------------

   /////////////For road issue create////////////
   Route::get('/roadissue/create', [RoadController::class, 'create'])->name('roadissue.create');
   Route::post('/roadissue/create',[RoadController::class, 'createSubmit'])->name('roadissue.create.submit');




  //-----------------------------------------Garbage Issue Functionality-------------------------------------------------

  ///////////////////Garbage issue create//////////
  Route::get('/garbageissue/create', [GarbageController::class, 'create'])->name('garbageissue.create');
   Route::post('/garbageissue/create',[GarbageController::class, 'createSubmit'])->name('garbageissue.create.submit');

   

//-------------------------------------Start Street Light  Issue Functionality-------------------------------------------------

///////////////////Street Light issue create//////////
  Route::get('/streetlightissue/create', [StreetLightController::class, 'create'])->name('streetlightissue.create');
   Route::post('/streetlightissue/create',[StreetLightController::class, 'createSubmit'])->name('streetlightissue.create.submit');

    
//-------------------------------------Start PublictoiletissueIssue Issue Functionality--------------------------------------------

//////////////////Publictoilet issue create//////////
Route::get('/publictoiletissue/create',[PublictoiletController::class, 'create'])->name('publictoiletissue.create');          // show the empty form

Route::post('/publictoiletissue/create',[PublictoiletController::class, 'createSubmit'])->name('publictoiletissue.create.submit');   // handle the submit

//---------------------------Start Mosquito Issue Functionallity--------------------

///////////For mosquito issue create////////////
  Route::get('/mosquitoissue/create', [MosquitoController::class, 'create'])->name('mosquitoissue.create');
   Route::post('/mosquitoissue/create',[MosquitoController::class, 'createSubmit'])->name('mosquitoissue.create.submit');

   


//---------------------------Start illigal structure Issue Functionallity--------------------

///////////For illigalstructureissue create////////////
  Route::get('/illegalstructureissue/create', [IllegalstructureController::class, 'create'])->name('illegalstructureissue.create');
   Route::post('/illegalstructureissue/create',[IllegalstructureController::class, 'createSubmit'])->name('illegalstructureissue.create.submit');

   /////////////////For illigalstructureissue list/////////////

  Route::get('/illegalstructureissue-list',[IllegalstructureController::class, 'list'])->name('illegalstructureissue.list');
  Route::get('/illegalstructureissue-details/{id}', [IllegalstructureController::class, 'details'])->name('illegalstructureissue.details');

//////////////For illigalstructureissue edit////////////////
Route::get('/illegalstructureissue/edit/{id}/{name?}', [IllegalstructureController::class, 'edit'])->name('illegalstructureissue.edit');
Route::post('/illegalstructureissue/edit', [IllegalstructureController::class, 'editSubmit'])->name('illegalstructureissue.edit.submit');



/////////////for illigalstructureissue delete////////////
Route::delete('/illegalstructureissue/delete/{id}', [IllegalstructureController::class, 'delete'])->name('illegalstructureissue.delete');
//----------------------------------------End Illegalstructureissue-----------------------------------------//

//-------------------------------User Show All Status list------------------------//

////////////////////////////////////User show road status/////////////////////////////////////////////

  Route::get('/roadshow-list',[RoadShowController::class, 'showlist'])->name('usershowroadlist.showlist');
  Route::get('/roadshow-details/{id}', [RoadShowController::class, 'showdetails'])->name('usershowroadlist.showdetails');
  Route::get('/roadshow/edit/{id}/{name?}', [RoadShowController::class, 'useredit'])->name('usershowroadlist.edit');
  Route::post('/roadshow/edit', [RoadShowController::class, 'usereditSubmit'])->name('usershowroadlist.edit.submit');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  Route::get('/garbageshow-list',[GarbageShowController::class, 'showlist'])->name('usershowgarbagelist.showlist');
  Route::get('/garbageshow-details/{id}', [GarbageShowController::class, 'showdetails'])->name('usershowgarbagelist.showdetails');
  Route::get('/garbageshow/edit/{id}/{name?}', [GarbageShowController::class, 'useredit'])->name('usershowgarbagelist.edit');
  Route::post('/garbageshow/edit', [GarbageShowController::class, 'usereditSubmit'])->name('usershowgarbagelist.edit.submit');

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  Route::get('/streetlightshow-list',[StreetlightShowController::class, 'showlist'])->name('usershowstreetlightlist.showlist');
  Route::get('/streetlightshow-details/{id}', [StreetlightShowController::class, 'showdetails'])->name('usershowstreetlightlist.showdetails');
  Route::get('/streetlightshow/edit/{id}/{name?}', [StreetlightShowController::class, 'useredit'])->name('usershowstreetlightlist.edit');
  Route::post('/streetlightshow/edit', [StreetlightShowController::class, 'usereditSubmit'])->name('usershowstreetlightlist.edit.submit');
  
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  Route::get('/publictoiletshow-list',[PublictoiletShowController::class, 'showlist'])->name('usershowpublictoiletlist.showlist');
  Route::get('/publictoiletshow-details/{id}', [PublictoiletShowController::class, 'showdetails'])->name('usershowpublictoiletlist.showdetails');
  Route::get('/publictoiletshow/edit/{id}/{name?}', [PublictoiletShowController::class, 'useredit'])->name('usershowpublictoiletlist.edit');
  Route::post('/publictoiletshow/edit', [PublictoiletShowController::class, 'usereditSubmit'])->name('usershowpublictoiletlist.edit.submit');

  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  Route::get('/mosquitoshow-list',[MosquitoShowController::class, 'showlist'])->name('usershowmosquitolist.showlist');
  Route::get('/mosquitoshow-details/{id}', [MosquitoShowController::class, 'showdetails'])->name('usershowmosquitolist.showdetails');
  Route::get('/mosquitoshow/edit/{id}/{name?}', [MosquitoShowController::class, 'useredit'])->name('usershowmosquitolist.edit');
  Route::post('/mosquitoshow/edit', [MosquitoShowController::class, 'usereditSubmit'])->name('usershowmosquitolist.edit.submit');
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  Route::get('/illegalstructureshow-list',[IllegalstructureShowController::class, 'showlist'])->name('usershowillegalstructurelist.showlist');
  Route::get('/illegalstructureshow-details/{id}', [IllegalstructureShowController::class, 'showdetails'])->name('usershowillegalstructurelist.showdetails');
  Route::get('/illegalstructureshow/edit/{id}/{name?}', [IllegalstructureShowController::class, 'useredit'])->name('usershowillegalstructurelist.edit');
  Route::post('/illegalstructureshow/edit', [IllegalstructureShowController::class, 'usereditSubmit'])->name('usershowillegalstructurelist.edit.submit');
    ///////////////////Make Profile//////////////
    Route::resource('personalprofile', PersonalProfileController::class);


    Route::group(['middleware'=>'admin'], static function(){

      
   /////////////////For road issue list/////////////

   Route::get('/roadissue-list', [RoadController::class, 'list'])->name('roadissue.list');
  Route::get('/roadissue-details/{id}', [RoadController::class, 'details'])->name('roadissue.details');
//////////////For road issue edit////////////////
Route::get('/roadissue/edit/{id}', [RoadController::class, 'edit'])->name('roadissue.edit');
Route::post('/roadissue/edit', [RoadController::class,'editSubmit'])->name('roadissue.edit.submit');

/////////////for road issue delete////////////
Route::delete('/roadissue/delete/{id}', [RoadController::class, 'delete'])->name('roadissue.delete');
 //-----------------------------------------End Road Issue Functionality-------------------------------------------------
/////////////////For Garbage issue list/////////////

   Route::get('/garbage-list', [GarbageController::class, 'list'])->name('garbageissue.list');
Route::get('/garbageissue-details/{id}', [GarbageController::class, 'details'])->name('garbageissue.details');

//////////////For Garbage issue edit////////////////
Route::get('/edit/{id}/{name?}', [GarbageController::class, 'edit'])->name('garbageissue.edit');

Route::post('/garbageissue/edit', [GarbageController::class,'editSubmit'])->name('garbageissue.edit.submit');

/////////////for garbage issue delete////////////
Route::delete('/garbageissue/delete/{id}', [GarbageController::class, 'delete'])->name('garbageissue.delete');
//-------------------------------------End Garbage Issue Functionality-------------------------------------------------
/////////////////For Street Light issue list/////////////

   Route::get('/streetlightissue-list', [StreetLightController::class, 'list'])->name('streetlightissue.list');
Route::get('/streetlightissue-details/{id}', [StreetLightController::class, 'details'])->name('streetlightissue.details');

//////////////For street light issue edit////////////////
Route::get('/streetlightissue/edit/{id}/{name}', [StreetLightController::class, 'edit'])->name('streetlightissue.edit');
Route::post('/streetlightissue/edit', [StreetLightController::class, 'editSubmit'])->name('streetlightissue.edit.submit');

/////////////for street light issue delete////////////
Route::delete('/streetlightissue/delete/{id}', [StreetLightController::class, 'delete'])->name('streetlightissue.delete');

//-------------------------------------End Street light Issue Functionality-------------------------------------------------
/////////////////For Public toilet issue list/////////////

  Route::get('/publictoiletissue-list',[PublictoiletController::class, 'list'])->name('publictoiletissue.list');

Route::get('/publictoiletissue-details/{id}', [PublictoiletController::class, 'details'])->name('publictoiletissue.details');

//////////////For Public Toilet issue edit////////////////
Route::get('/publictoiletissue/edit/{id}/{name?}', [PublictoiletController::class, 'edit'])->name('publictoiletissue.edit');
Route::post('edit', [PublictoiletController::class,'editSubmit'])->name('publictoiletissue.edit.submit');


/////////////for Public toilet delete////////////
Route::delete('/publictoiletissue/delete/{id}', [PublictoiletController::class, 'delete'])->name('publictoiletissue.delete');
//---------------------------------End Public toilet functionality---------------------------------------------------

/////////////////For mosquitoissue issue list/////////////

  Route::get('/mosquitoissue-list',[MosquitoController::class, 'list'])->name('mosquitoissue.list');

Route::get('/mosquitoissue-details/{id}', [MosquitoController::class, 'details'])->name('mosquitoissue.details');

//////////////For mosquitoissue issue edit////////////////

Route::get('/mosquitoissue/edit/{id}/{name?}', [MosquitoController::class, 'edit'])->name('mosquitoissue.edit');
Route::post('/mosquitoissue/edit', [MosquitoController::class, 'editSubmit'])->name('mosquitoissue.edit.submit');

/////////////for mosquitoissue delete////////////
Route::delete('/mosquitoissue/delete/{id}', [MosquitoController::class, 'delete'])->name('mosquitoissue.delete');
//----------------------------End Mosquito issue functionality-----------------------

 /////////////////For illigalstructureissue list/////////////

  Route::get('/illegalstructureissue-list',[IllegalstructureController::class, 'list'])->name('illegalstructureissue.list');
  Route::get('/illegalstructureissue-details/{id}', [IllegalstructureController::class, 'details'])->name('illegalstructureissue.details');

//////////////For illigalstructureissue edit////////////////
Route::get('/illegalstructureissue/edit/{id}/{name?}', [IllegalstructureController::class, 'edit'])->name('illegalstructureissue.edit');
Route::post('/illegalstructureissue/edit', [IllegalstructureController::class, 'editSubmit'])->name('illegalstructureissue.edit.submit');



/////////////for illigalstructureissue delete////////////
Route::delete('/illegalstructureissue/delete/{id}', [IllegalstructureController::class, 'delete'])->name('illegalstructureissue.delete');
//----------------------------------------End Illegalstructureissue-----------------------------------------//

    });



  });



require __DIR__.'/auth.php';
