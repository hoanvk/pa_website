<?php
Route::group(['middleware' => ['web','useronline']], function () {
  //
  Route::get('motor/{policy_id}/confirm', [
      'as'=>'motor.confirm',
      'uses'=>'MotorController@confirm'
  ]);
  //End date
  Route::get('ajax/motor/period', [
      'as'=>'ajax.period',
      'uses'=>'MotorController@period'
      ]);
    Route::get('ajax/member/self', [
        'as'=>'ajax.insured',
        'uses'=>'MemberController@self'
        ]);
  //Choose PA product
  Route::get('{project}/motor', [
      'as'=>'motor.index',
      'uses'=>'MotorController@index'
      ]);

  Route::get('motor/{product_id}/create',[
      'as'=>'motor.create',
      'uses'=>'MotorController@create']
   );
  
   Route::get('motor/{product_id}/{policy_id}', [
      'as'=>'motor.show',
      'uses'=>'MotorController@show'
  ]);
  
   Route::post('motor/{product_id}', [
      'as' => 'motor.store',
      'uses' => 'MotorController@store'
  ]);
  
  Route::put('motor/{product_id}/{policy_id}', [
      'as' => 'motor.update',
      'uses' => 'MotorController@update'
  ]);

  Route::get('motor/{product_id}/{policy_id}/edit', [
      'as'=>'motor.edit',
      'uses'=>'MotorController@edit'
  ]);
  
  Route::delete('motor/{product_id}/{policy_id}', [
      'as'=>'motor.destroy',
      'uses'=>'MotorController@destroy'
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
    
    Route::get('checkout/{payment_id}/confirm',[
        'as'=>'checkout.confirm',
        'uses'=>'CheckoutController@confirm']); 

    Route::post('checkout/{policy_id}', [
        'as' => 'checkout.store',
        'uses' => 'CheckoutController@store'
    ]);
});