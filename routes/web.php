<?php

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

Route::get('/', function () {
    return redirect()->route('travel.create');
});
// Route::get('home', [
//     'as'=>'home.index',
//     'uses'=>'HomeController@index']);
    
// Route::get('pa/{id}/quotation',[
//     'as'=>'pa.quotation',
//     'uses'=>'PAController@quotation']
//  );
Route::group(['prefix' => 'agent','middleware' => 'auth'], function () {
    //PA
    Route::get('pa/create',[
        'as'=>'pa.create',
        'uses'=>'PAController@create']
     );
    
     Route::get('/pa/details', [
        'as'=>'pa.details',
        'uses'=>'PAController@Details'
    ]);
    
     Route::post('pa', [
        'as' => 'pa.store',
        'uses' => 'PAController@store'
    ]);
    
    Route::get('/pa/edit', [
        'as'=>'pa.edit',
        'uses'=>'PAController@Edit'
    ]);
    
    Route::get('/pa/confirm', [
        'as'=>'pa.confirm',
        'uses'=>'PAController@confirm'
    ]);

    //Travel online
    Route::get('travel', [
        'as'=>'travel.index',
        'uses'=>'TravelController@index'
        ]);
    Route::get('travel/create',[
        'as'=>'travel.create',
        'uses'=>'TravelController@create']
     );
    
     Route::post('travel', [
        'as' => 'travel.store',
        'uses' => 'TravelController@store'
    ]);
    Route::get('travel/{id}', [
        'as'=>'travel.show',
        'uses'=>'TravelController@show'
    ]);

    Route::put('travel/{id}', [
        'as' => 'travel.update',
        'uses' => 'TravelController@update'
    ]);
    Route::get('travel/{id}/edit', [
        'as'=>'travel.edit',
        'uses'=>'TravelController@edit'
    ]);  
    Route::get('travel/confirm/{id}', [
        'as'=>'travel.confirm',
        'uses'=>'TravelController@confirm'
    ]);

    //Member
    Route::get('members/{policy_id}',[
        'as'=>'members.index',
        'uses'=>'MemberController@index']
    ); 

    Route::get('members/{policy_id}/create', [
        'as'=>'members.create',
        'uses'=>'MemberController@Create'
    ]);
    Route::get('members/{policy_id}/{id}', [
        'as'=>'members.show',
        'uses'=>'MemberController@show'
    ]);
    Route::post('members/{policy_id}', [
        'as' => 'members.store',
        'uses' => 'MemberController@Store'
    ]);
    Route::put('members/{policy_id}/{id}', [
        'as' => 'members.update',
        'uses' => 'MemberController@Update'
    ]);
    Route::get('members/{policy_id}/{id}/edit', [
        'as'=>'members.edit',
        'uses'=>'MemberController@Edit'
    ]); 
    Route::delete('members/{policy_id}/{id}', [
        'as'=>'members.destroy',
        'uses'=>'MemberController@destroy'
    ]);

    Route::resource('reports','ReportController');
});
 

//  Route::get('pa/{id}/quotation',[
//     'as'=>'pa.quotation',
//     'uses'=>'PAController@quotation']
//  )->middleware('pa.quotation');

//Admin

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    //User Admin
    
    Route::resource('users','UserController');

    //Table and Codes
    Route::resource('items','ItemController');

    //Roles
    Route::get('roles',[
        'as'=>'roles.index',
        'uses'=>'RoleController@index']
    ); 

    Route::get('/roles/create', [
        'as'=>'roles.create',
        'uses'=>'RoleController@Create'
    ]);
    Route::get('/roles/{id}', [
        'as'=>'roles.details',
        'uses'=>'RoleController@Details'
    ]);
    Route::post('/roles', [
        'as' => 'roles.store',
        'uses' => 'RoleController@Store'
    ]);
    Route::put('/roles/{id}', [
        'as' => 'roles.update',
        'uses' => 'RoleController@Update'
    ]);
    Route::get('/roles/{id}/edit', [
        'as'=>'roles.edit',
        'uses'=>'RoleController@Edit'
    ]); 

    //Permission
    Route::get('permissions',[
        'as'=>'permissions.index',
        'uses'=>'PermissionController@index']
    ); 

    Route::get('/permissions/create', [
        'as'=>'permissions.create',
        'uses'=>'PermissionController@Create'
    ]);
    Route::get('/permissions/{id}', [
        'as'=>'permissions.details',
        'uses'=>'PermissionController@Details'
    ]);
    Route::post('/permissions', [
        'as' => 'permissions.store',
        'uses' => 'PermissionController@Store'
    ]);
    Route::put('/permissions/{id}', [
        'as' => 'permissions.update',
        'uses' => 'PermissionController@Update'
    ]);
    Route::get('/permissions/{id}/edit', [
        'as'=>'permissions.edit',
        'uses'=>'PermissionController@Edit'
    ]); 

    //Agent
    Route::get('agents',[
        'as'=>'agents.index',
        'uses'=>'AgentController@index']
    ); 

    Route::get('/agents/create', [
        'as'=>'agents.create',
        'uses'=>'AgentController@Create'
    ]);
    Route::get('/agents/{id}', [
        'as'=>'agents.details',
        'uses'=>'AgentController@Details'
    ]);
    Route::post('/agents', [
        'as' => 'agents.store',
        'uses' => 'AgentController@Store'
    ]);
    Route::put('/agents/{id}', [
        'as' => 'agents.update',
        'uses' => 'AgentController@Update'
    ]);
    Route::get('/agents/{id}/edit', [
        'as'=>'agents.edit',
        'uses'=>'AgentController@Edit'
    ]); 
    //Product
    Route::resource('products','ProductController');
    
    Route::resource('destinations','DestinationController');
    Route::resource('dayranges','DayRangeController');
    Route::resource('prices','PriceController');

    

    Route::resource('cashes','CashController');
    Route::resource('autonumbers','AutoNumberController');
    Route::resource('plans','PlanController');
    Route::resource('agentplans','AgentPlanController');
    
});
Route::group(['prefix' => 'export','middleware' => ['auth']], function () {
    Route::get('prices', [
        'as'=>'prices.export',
        'uses'=>'ExportController@prices'
    ]);
    Route::get('travel', [
        'as'=>'travel.export',
        'uses'=>'ExportController@travel'
    ]);
});
Route::group(['prefix' => 'import','middleware' => ['auth']], function () {
    Route::get('prices', [
        'as'=>'prices.import',
        'uses'=>'ImportController@prices'
    ]);
    Route::post('prices', [
        'as'=>'prices.upload',
        'uses'=>'ImportController@upload'
    ]);
});
Auth::routes();

Route::get('/home', function ()
{
    # code...
    return redirect()->route('travel.create');
});
