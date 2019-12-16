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
    return redirect()->route('pa.index',['project'=>'1']);
})->name('home');
Route::get('locale/{locale}', function ($locale) {
    session::put('locale',$locale);
    return redirect()->back();
    
});

//Admin

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
Route::get('/agent', function ()
{
    # code...
    return redirect()->route('travel.index');
});
Route::get('/admin', function ()
{
    # code...
    return redirect()->route('cashes.index');
});
