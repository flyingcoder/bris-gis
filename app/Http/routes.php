<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::get('/',[
    'as' => 'home.indexUI',
    'uses' => 'PageController@homeIndex'
    ]);
    Route::get('/homeUI',[
    'as' => 'home.indexUI',
    'uses' => 'PageController@homeIndex'
    ]);
    Route::get('/mapspopuUI',[
    'as' => 'mapspopu.indexUI',
    'uses' => 'PageController@mappopuIndex'
    ]);
    Route::get('/reportsUI',[
    'as' => 'reports.indexUI',
    'uses' => 'PageController@reportIndex'
    ]);
    Route::get('/usersUI',[
    'as' => 'users.indexUI',
    'uses' => 'PageController@userIndex'
    ]);
    Route::get('/mapsfloodUI',[
    'as' => 'mapsflood.indexUI',
    'uses' => 'PageController@mapfloodIndex'
    ]);
 
    Route::get('/healthUI',[
    'as' => 'health.indexUI',
    'uses' => 'PageController@healthIndex'
    ]);
    Route::auth();
//    Route::get('/home', 'HomeController@index');
//    Route::get('/', 'HomeController@index');
//    Route::resource('users', 'UserController');

    Route::get('/barangaysOption',[
    'as' => 'barangays.option',
    'uses' => 'PageController@barangayOption'
    ]);

    Route::get('/householdsOption',[
    'as' => 'buildings.option',
    'uses' => 'PageController@buildingOption'
    ]);
    
    Route::get('/disastersOption',[
    'as' => 'disasters.option',
    'uses' => 'PageController@disasterOption'
    ]);

    Route::get('provinces/all',[
    'as' => 'provinces.get',
    'uses' => 'ProvinceController@getProvinces'
    ]);

    Route::get('provinces/{id}/municipalities',[
    'as' => 'municipalities.get',
    'uses' => 'ProvinceController@getMunicipalities'
    ]);

    Route::get('municipalities/{id}/barangays',[
    'as' => 'barangays.get',
    'uses' => 'MunicipalityController@getBarangays'
    ]);

    Route::get('barangays/{id}/households',[
    'as' => 'households.get',
    'uses' => 'BuildingController@getHouseholds'
    ]);

    Route::get('barangays/{id}/householdsdetails',[
    'as' => 'households.getDetails',
    'uses' => 'BuildingController@getHouseholdsDetails'
    ]);

    Route::get('barangays/{id}/puroks',[
    'as' => 'puroks.get',
    'uses' => 'PurokController@getPuroks'
    ]);

    Route::post('barangays/importboundary',[
    'as' => 'puroks.importboundary',
    'uses' => 'PurokController@importBoundary'
    ]);

    Route::post('barangays/importfloodmap',[
    'as' => 'floodMaps.importfloodmap',
    'uses' => 'FloodMapController@importFloodMap'
    ]);

    Route::get('barangays/{id}/households/create',[
    'as' => 'buildings.addbuilding',
    'uses' => 'BuildingController@addBuilding'
    ]);

    Route::post('disasters/addDisasters',[
    'as' => 'disasters.addDisasters',
    'uses' => 'DisasterController@addDisasters'
    ]);

    Route::get('barangays/{id}/addDisaster',[
    'as' => 'disasters.addpage',
    'uses' => 'DisasterController@addDisaster'
    ]);

    Route::resource('provinces', 'ProvinceController');
    Route::resource('municipalities', 'MunicipalityController');
    Route::resource('barangays', 'BarangayController');
    Route::resource('floodMaps', 'FloodMapController');
    Route::resource('buildings', 'BuildingController');
    Route::resource('puroks', 'PurokController');
    Route::resource('families', 'FamilyController');
    Route::resource('residents', 'ResidentController');
    Route::resource('diseases', 'DiseaseController');
    Route::resource('disasters', 'DisasterController');


    //Route::resource('maps', 'MapController'); 
    //Route::resource('reports', 'ReportController');  
          
});