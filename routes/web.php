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
    return redirect()->route('pa.index');
});
Route::get('locale/{locale}', function ($locale) {
    session::put('locale',$locale);
    return redirect()->back();
    
});
Route::group(['prefix' => 'online','middleware' => 'web'], function () {
    Route::get('ajax/pa/period', [
        'as'=>'ajax.period',
        'uses'=>'PAController@period'
        ]);
    Route::get('pa', [
        'as'=>'pa.index',
        'uses'=>'PAController@index'
        ]);

    Route::get('pa/{product_id}/create',[
        'as'=>'pa.create',
        'uses'=>'PAController@create']
     );
    
     Route::get('pa/{product_id}/{id}', [
        'as'=>'pa.show',
        'uses'=>'PAController@show'
    ]);
    
     Route::post('pa/{product_id}', [
        'as' => 'pa.store',
        'uses' => 'PAController@store'
    ]);
    
    Route::put('pa/{product_id}/{id}', [
        'as' => 'pa.update',
        'uses' => 'PAController@update'
    ]);

    Route::get('pa/{product_id}/{id}/edit', [
        'as'=>'pa.edit',
        'uses'=>'PAController@edit'
    ]);
    
    Route::get('pa/{product_id}/{id}/confirm', [
        'as'=>'pa.confirm',
        'uses'=>'PAController@confirm'
    ]);
});
Route::group(['prefix' => 'agent','middleware' => 'auth'], function () {
    //PA
    

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
    
    Route::resource('roles','RoleController');
    //Permission
     
    Route::resource('permissions','PermissionController');
    //Agent
    
    Route::resource('agents','AgentController');
    //Product
    Route::resource('products','ProductController');
    Route::resource('promotions','PromoController');
    Route::resource('destinations','DestinationController');
    Route::resource('dayranges','DayRangeController');
    Route::resource('prices','PriceController');
    

    Route::get('paprices/{product_id}', [
        'as'=>'paprices.index',
        'uses'=>'PAPriceController@index'
    ]);
    Route::get('paprices/{product_id}/create', [
        'as'=>'paprices.create',
        'uses'=>'PAPriceController@create'
    ]);
    Route::get('paprices/{product_id}/{id}', [
        'as'=>'paprices.show',
        'uses'=>'PAPriceController@show'
    ]);
    
    Route::post('paprices/{product_id}', [
        'as' => 'paprices.store',
        'uses' => 'PAPriceController@store'
    ]);
    Route::put('paprices/{product_id}/{id}', [
        'as' => 'paprices.update',
        'uses' => 'PAPriceController@Update'
    ]);
    Route::get('paprices/{product_id}/{id}/edit', [
        'as'=>'paprices.edit',
        'uses'=>'PAPriceController@Edit'
    ]); 
    Route::delete('paprices/{product_id}/{id}', [
        'as'=>'paprices.destroy',
        'uses'=>'PAPriceController@destroy'
    ]);
    Route::resource('cashes','CashController');
    Route::resource('autonumbers','AutoNumberController');
    Route::resource('plans','PlanController');
    Route::resource('agentplans','AgentPlanController');
    Route::resource('benefits','BenefitController');
    Route::resource('periods','PeriodController');
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
Route::get('/admin', function ()
{
    # code...
    return redirect()->route('cashes.index');
});
