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

Route::get('/', [
    'as'=>'home',
    'uses'=>'HomeController@index'
]);
Route::get('locale/{locale}', function ($locale) {
    session::put('locale',$locale);
    return redirect()->back();
    
});
Route::group(['prefix' => 'online','middleware' => 'web'], function () {
    //
    Route::get('pa/{policy_id}/confirm', [
        'as'=>'pa.confirm',
        'uses'=>'PAController@confirm'
    ]);
    //End date
    Route::get('ajax/pa/period', [
        'as'=>'ajax.period',
        'uses'=>'PAController@period'
        ]);

    //Choose PA product
    Route::get('pa', [
        'as'=>'pa.index',
        'uses'=>'PAController@index'
        ]);

    Route::get('pa/{product_id}/create',[
        'as'=>'pa.create',
        'uses'=>'PAController@create']
     );
    
     Route::get('pa/{product_id}/{policy_id}', [
        'as'=>'pa.show',
        'uses'=>'PAController@show'
    ]);
    
     Route::post('pa/{product_id}', [
        'as' => 'pa.store',
        'uses' => 'PAController@store'
    ]);
    
    Route::put('pa/{product_id}/{policy_id}', [
        'as' => 'pa.update',
        'uses' => 'PAController@update'
    ]);

    Route::get('pa/{product_id}/{policy_id}/edit', [
        'as'=>'pa.edit',
        'uses'=>'PAController@edit'
    ]);
    
    Route::delete('pa/{product_id}/{policy_id}', [
        'as'=>'pa.destroy',
        'uses'=>'PAController@destroy'
    ]);

    //Customer
    Route::get('customers/{policy_id}',[
        'as'=>'customers.index',
        'uses'=>'CustomerController@index']
     );

    Route::get('customers/{policy_id}/create',[
        'as'=>'customers.create',
        'uses'=>'CustomerController@create']
     );
    
     Route::get('customers/{policy_id}/{id}', [
        'as'=>'customers.show',
        'uses'=>'CustomerController@show'
    ]);
    
     Route::post('customers/{policy_id}', [
        'as' => 'customers.store',
        'uses' => 'CustomerController@store'
    ]);
    
    Route::put('customers/{policy_id}/{id}', [
        'as' => 'customers.update',
        'uses' => 'CustomerController@update'
    ]);

    Route::get('customers/{policy_id}/{id}/edit', [
        'as'=>'customers.edit',
        'uses'=>'CustomerController@edit'
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
    
    //Begin PA Price
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
    //End Price    

    //Begin Benefit
    Route::get('benefits/{product_id}', [
        'as'=>'benefits.index',
        'uses'=>'BenefitController@index'
    ]);
    Route::get('benefits/{product_id}/create', [
        'as'=>'benefits.create',
        'uses'=>'BenefitController@create'
    ]);
    Route::get('benefits/{product_id}/{id}', [
        'as'=>'benefits.show',
        'uses'=>'BenefitController@show'
    ]);
    
    Route::post('benefits/{product_id}', [
        'as' => 'benefits.store',
        'uses' => 'BenefitController@store'
    ]);
    Route::put('benefits/{product_id}/{id}', [
        'as' => 'benefits.update',
        'uses' => 'BenefitController@Update'
    ]);
    Route::get('benefits/{product_id}/{id}/edit', [
        'as'=>'benefits.edit',
        'uses'=>'BenefitController@Edit'
    ]); 
    Route::delete('benefits/{product_id}/{id}', [
        'as'=>'benefits.destroy',
        'uses'=>'BenefitController@destroy'
    ]);
    //End benefit    


    Route::resource('cashes','CashController');
    Route::resource('autonumbers','AutoNumberController');
    Route::resource('plans','PlanController');
    Route::resource('agentplans','AgentPlanController');
    
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

Route::get('/online', function ()
{
    # code...
    return redirect()->route('pa.index');
});
Route::get('/admin', function ()
{
    # code...
    return redirect()->route('cashes.index');
});
