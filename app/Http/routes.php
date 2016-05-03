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
    Route::get('/mapsOption',[
    'as' => 'maps.option',
    'uses' => 'PageController@mapsOption'
    ]);
 

    Route::auth();
//    Route::get('/home', 'HomeController@index');
//    Route::get('/', 'HomeController@index');
    Route::resource('users', 'UserController');

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

    Route::get('/healthOption',[
    'as' => 'health.option',
    'uses' => 'PageController@healthOption'
    ]);

    Route::get('/reportOption',[
    'as' => 'reports.option',
    'uses' => 'PageController@reportOption'
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

    Route::post('diseases/addDiseases',[
    'as' => 'diseases.addDiseases',
    'uses' => 'DiseaseController@addDiseases'
    ]);

    Route::get('barangays/{id}/addDisease',[
    'as' => 'diseases.addpage',
    'uses' => 'DiseaseController@addDisease'
    ]);

    Route::get('barangays/{id}/residentsdetails',[
    'as' => 'residents.getDetails',
    'uses' => 'ResidentController@getResidentsDetails'
    ]);

    Route::get('barangays/{id}/reports',[
    'as' => 'reports.reportpage',
    'uses' => 'ReportController@showReports'
    ]);

    Route::get('barangays/generateReports',[
    'as' => 'reports.generate',
    'uses' => 'ReportController@generateReport'
    ]);

    Route::get('barangays/{id}/maps/getDisaster',[
    'as' => 'maps.getDisaster',
    'uses' => 'MapController@getDisaster'
    ]);

    Route::get('barangays/{id}/maps/getBoundary',[
    'as' => 'maps.getBoundary',
    'uses' => 'MapController@getBoundary'
    ]);

    Route::get('barangays/{id}/maps/getHealth',[
    'as' => 'maps.getHealth',
    'uses' => 'MapController@getHealth'
    ]);

    Route::get('barangays/{id}/maps/getPointOnNotLevel',[
    'as' => 'maps.getPointOnNotLevel',
    'uses' => 'MapController@getPointOnNotLevel'
    ]);

    Route::get('barangays/{id}/maps/getPointOnLevel',[
    'as' => 'maps.getPointOnLevel',
    'uses' => 'MapController@getPointOnLevel'
    ]);

    Route::get('barangays/{id}/maps/getfloodmaps',[
    'as' => 'maps.getFloodMaps',
    'uses' => 'MapController@getFloodMaps'
    ]);

    Route::get('barangays/{id}/maps/gethousehold',[
    'as' => 'maps.getHouseholds',
    'uses' => 'MapController@getHouseholds'
    ]);

    Route::get('barangays/{id}/maps/{type}',[
    'as' => 'maps.show',
    'uses' => 'MapController@showMaps'
    ]);

    Route::get('barangays/search',[
    'as' => 'search.advancesearch',
    'uses' => 'PageController@searchIndex'
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
          
});