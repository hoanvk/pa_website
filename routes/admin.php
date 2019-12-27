<?php

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
    
    
    //Begin Period
    Route::get('periods/{product_id}', [
        'as'=>'periods.index',
        'uses'=>'PeriodController@index'
    ]);
    Route::get('periods/{product_id}/create', [
        'as'=>'periods.create',
        'uses'=>'PeriodController@create'
    ]);
    Route::get('periods/{product_id}/{id}', [
        'as'=>'periods.show',
        'uses'=>'PeriodController@show'
    ]);
    
    Route::post('periods/{product_id}', [
        'as' => 'periods.store',
        'uses' => 'PeriodController@store'
    ]);
    Route::put('periods/{product_id}/{id}', [
        'as' => 'periods.update',
        'uses' => 'PeriodController@Update'
    ]);
    Route::get('periods/{product_id}/{id}/edit', [
        'as'=>'periods.edit',
        'uses'=>'PeriodController@Edit'
    ]); 
    Route::delete('periods/{product_id}/{id}', [
        'as'=>'periods.destroy',
        'uses'=>'PeriodController@destroy'
    ]);
    //End Period  

    //Begin Period
    Route::get('patrans', [
        'as'=>'patrans.index',
        'uses'=>'PATranController@index'
    ]);
});