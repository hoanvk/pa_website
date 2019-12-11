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
})->name('home');
Route::get('locale/{locale}', function ($locale) {
    session::put('locale',$locale);
    return redirect()->back();
    
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
Route::get('/admin', function () {
    return redirect()->route('agent.travel.order_list_pending');
});

Route::get('change-password', 'ChangePasswordController@index');
Route::get('user-profile', 'UserProfileController@index')->name('user.profile');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

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
