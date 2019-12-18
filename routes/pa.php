<?php
Route::group(['middleware' => 'web'], function () {
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
    Route::get('ajax/member/self', [
        'as'=>'ajax.insured',
        'uses'=>'MemberController@self'
        ]);
  //Choose PA product
  Route::get('{project}/pa', [
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

  /**
   * Checkout
   */
  Route::get('checkout/{policy_id}',[
    'as'=>'checkout.index',
    'uses'=>'CheckoutController@index']); 
    
    Route::get('checkout/{policy_id}/confirm',[
        'as'=>'checkout.confirm',
        'uses'=>'CheckoutController@confirm']); 

    Route::post('checkout/{policy_id}', [
        'as' => 'checkout.store',
        'uses' => 'CheckoutController@store'
    ]);
});