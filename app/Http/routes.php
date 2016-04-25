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
    Route::get('/provincesUI',[
    'as' => 'provinces.indexUI',
    'uses' => 'PageController@provinceIndex'
    ]);
    Route::get('/barangaysOption',[
    'as' => 'barangays.option',
    'uses' => 'PageController@barangayOption'
    ]);
    Route::get('/householdsOption',[
    'as' => 'buildings.option',
    'uses' => 'PageController@buildingOption'
    ]);
    Route::get('/householdsUI',[
    'as' => 'households.indexUI',
    'uses' => 'PageController@householdIndex'
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
    Route::get('/municipalityUI',[
    'as' => 'provinces.cityUI',
    'uses' => 'PageController@municipalityIndex'
    ]);
    Route::get('/puroksUI',[
    'as' => 'barangays.purokUI',
    'uses' => 'PageController@purokIndex'
    ]);
    Route::get('/household_detailsUI',[
    'as' => 'households.household_details.household_detailUI',
    'uses' => 'PageController@household_detailIndex'
    ]);
    Route::get('/family_profileUI',[
    'as' => 'households.family_profiles.family_profileUI',
    'uses' => 'PageController@family_profileIndex'
    ]);
    Route::get('/resident_profileUI',[
    'as' => 'households.resident_profiles.resident_profileUI',
    'uses' => 'PageController@resident_profileIndex'
    ]);
     Route::get('/household_createUI',[
    'as' => 'households.createUI',
    'uses' => 'PageController@householdCreate'
    ]);
//    Route::auth();
//    Route::get('/home', 'HomeController@index');
//    Route::get('/', 'HomeController@index');
    //Route::resource('users', 'UserController');

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

    Route::resource('provinces', 'ProvinceController');
    Route::resource('municipalities', 'MunicipalityController');
    Route::resource('barangays', 'BarangayController');
    Route::resource('floodMaps', 'FloodMapController');
    Route::resource('buildings', 'BuildingController');
    Route::resource('puroks', 'PurokController');
    Route::resource('families', 'FamilyController');
    Route::resource('residents', 'ResidentController');
    Route::resource('diseases', 'DiseaseController');

    /*Route::get('/barangays/{id}',[
    'as' => 'barangays.getbarangays',
    'uses' => 'BarangayController@getbarangays'
    ]);*/
    Route::resource('barangays', 'BarangayController');
    Route::resource('households', 'HouseholdController');

    //Route::resource('maps', 'MapController'); 
    //Route::resource('reports', 'ReportController');  


    //Route::delete('/municipalities/remove/{province_id}/{municipality_id}',[
    //'as' => 'municipalities.remove',
    //'uses' => 'MunicipalityController@remove'
    //]);            
});