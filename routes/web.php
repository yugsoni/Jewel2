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
    return view('index');
});
// Route::get('/', 'DashboardController@dashboardAnalytics');
Auth::routes(['verify' => true]);
// Route Dashboards
Route::get('/dashboard-analytics', 'DashboardController@dashboardAnalytics');
Route::get('/profile', 'ProfileController@index');
Route::get('/edit_profile', 'ProfileController@edit_page');
Route::post('/edit_profile', 'ProfileController@edit')->name('edit_profile');

Route::get('/view-bn', 'Business_masterController@index');
Route::post('/view-bn/{id}', 'Business_masterController@destroy')->name('delete_b');
Route::get('/edit-b/{id}', 'Business_masterController@edit')->name('edit_b');
Route::post('/edit-b/{id}', 'Business_masterController@update')->name('update_b');

Route::get('add-c', 'City_masterController@index');
Route::post('add-c', 'City_masterController@store')->name('add_city');
Route::get('view-c', 'City_masterController@show');
Route::post('/view-c/{id}', 'City_masterController@destroy')->name('delete_c');
Route::get('/edit-c/{id}', 'City_masterController@edit')->name('edit_c');
Route::post('/edit-c/{id}', 'City_masterController@update')->name('update_c');

Route::get('add-s', 'State_masterController@index');
Route::post('add-s', 'State_masterController@store')->name('add_state');
Route::get('view-s', 'State_masterController@show');
Route::post('/view-s/{id}', 'State_masterController@destroy')->name('delete_s');
Route::get('/edit-s/{id}', 'State_masterController@edit')->name('edit_s');
Route::post('/edit-s/{id}', 'State_masterController@update')->name('update_s');

Route::get('add-co', 'Country_masterController@index');
Route::post('add-co', 'Country_masterController@store')->name('add_country');
Route::get('view-co', 'Country_masterController@show');
Route::post('/view-co/{id}', 'Country_masterController@destroy')->name('delete_co');
Route::get('/edit-co/{id}', 'Country_masterController@edit')->name('edit_co');
Route::post('/edit-co/{id}', 'Country_masterController@update')->name('update_co');

Route::get('add-bt', 'Businesstype_masterController@index');
Route::post('add-bt', 'Businesstype_masterController@store')->name('add_business_type');
Route::get('view-bt', 'Businesstype_masterController@show');
Route::post('/view-bt/{id}', 'Businesstype_masterController@destroy')->name('delete_bt');
Route::get('/edit-bt/{id}', 'Businesstype_masterController@edit')->name('edit_bt');
Route::post('/edit-bt/{id}', 'Businesstype_masterController@update')->name('update_bt');

Route::get('add-sp', 'Speciality_masterController@index');
Route::post('add-sp', 'Speciality_masterController@store')->name('add_Specialities');
Route::get('view-sp', 'Speciality_masterController@show');
Route::post('/view-sp/{id}', 'Speciality_masterController@destroy')->name('delete_sp');
Route::get('/edit-sp/{id}', 'Speciality_masterController@edit')->name('edit_sp');
Route::post('/edit-sp/{id}', 'Speciality_masterController@update')->name('update_sp');

Route::get('add-k', 'Keyword_masterController@index');
Route::post('add-k', 'Keyword_masterController@store')->name('add_Keywords');
Route::get('view-k', 'Keyword_masterController@show');
Route::post('/view-k/{id}', 'Keyword_masterController@destroy')->name('delete_k');
Route::get('/edit-k/{id}', 'Keyword_masterController@edit')->name('edit_k');
Route::post('/edit-k/{id}', 'Keyword_masterController@update')->name('update_k');

Route::get('add-ca', 'Category_masterController@index');
Route::post('add-ca', 'Category_masterController@store')->name('add_Category');
Route::get('view-ca', 'Category_masterController@show');
Route::post('/view-ca/{id}', 'Category_masterController@destroy')->name('delete_ca');
Route::get('/edit-ca/{id}', 'Category_masterController@edit')->name('edit_ca');
Route::post('/edit-ca/{id}', 'Category_masterController@update')->name('update_ca');

Route::get('add-sc', 'SubCategory_masterController@index');
Route::post('add-sc', 'SubCategory_masterController@store')->name('add_SubCategory');
Route::get('view-sc', 'SubCategory_masterController@show');
Route::post('/view-sc/{id}', 'SubCategory_masterController@destroy')->name('delete_sc');
Route::get('/edit-sc/{id}', 'SubCategory_masterController@edit')->name('edit_sc');
Route::post('/edit-sc/{id}', 'SubCategory_masterController@update')->name('update_sc');

Route::get('add-im', 'Item_masterController@index');
Route::post('add-im', 'Item_masterController@store')->name('add_SubCategory');
Route::get('view-im', 'Item_masterController@show');
Route::post('/view-im/{id}', 'Item_masterController@destroy')->name('delete_im');
Route::get('/edit-im/{id}', 'Item_masterController@edit')->name('edit_im');
Route::post('/edit-im/{id}', 'Item_masterController@update')->name('update_im');

Route::post('/login/validate', 'Auth\LoginController@validate_api');
