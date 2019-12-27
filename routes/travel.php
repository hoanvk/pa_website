<?php
Route::group(['middleware' => ['web','useronline']], function () {
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