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

//Route::get('/', function () {
//    return view('welcome');
//});



//User Routes
use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController@Login')->name('login');
Route::post('/', 'UserController@userLogin');
Route::get('/logout', 'UserController@logOut');

Route::group([ 'middleware' => 'UserLoginCheck'], function() {

    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/dashboard/get-opportunity-data','DashboardController@getOpportunityData');
    Route::post('/dashboard/search','DashboardController@search');

    //Profile Routes
    Route::get('/profile', 'UserController@profile');
    Route::get('/viewprofile/{id}', 'UserController@viewProfile');

    //Account Routes
    Route::get('/account','AccountController@index')->name('account');
    Route::get('/account/all','AccountController@allAccount');
    Route::get('/account/details/{id}','AccountController@details')->name('account.details');
    Route::post('/account', 'AccountController@addAccount');
    Route::post('/account/edit', 'AccountController@editAccount');
    Route::get('/account/delete/{id}', 'AccountController@deleteAccount');
    Route::post('/account/add-opportunity', 'AccountController@addOpportunity');
    Route::post('/account/update-opportunity', 'AccountController@updateOpportunityStatus');
    Route::get('/account/check-duplicate/{website}', 'AccountController@duplicateAccountCheck');
    Route::post('/account/add-notes', 'AccountController@addNotes');
    Route::post('/account/add-activity', 'AccountController@addActivity');

//Contact Routes
    Route::get('/contact','ContactController@index')->name('contact');
    Route::get('/contact/all','ContactController@allContact');
    Route::post('/contact','ContactController@addContact');
    Route::post('/contact/edit','ContactController@editContact');
    Route::get('/contact/delete/{id}', 'ContactController@deleteContact');
    Route::get('/contact/details/{id}','ContactController@details')->name('contact.details');
    Route::post('/contact/add-opportunity', 'ContactController@addOpportunity');
    Route::post('/contact/update-opportunity', 'ContactController@updateOpportunityStatus');
    Route::get('/contact/check-duplicate/{email}', 'ContactController@duplicateContactCheck');
    Route::post('/contact/add-notes', 'ContactController@addNotes');
    Route::post('/contact/add-activity', 'ContactController@addActivity');


    //Activity Routes
    Route::get('/activity', 'ActivityController@index')->name('activity');
    Route::post('/activity/update-status', 'ActivityController@updateStatus');


//Account Opportunity Routes
    Route::get('/opportunity', 'OpportunityController@index');
    Route::get('/opportunity/account/details/{id}', 'OpportunityController@accountOpportunityDetails');
    Route::post('/opportunity/account/edit', 'OpportunityController@editAccountOpportunity');
    Route::get('/opportunity/account/delete/{id}', 'OpportunityController@deleteAccountOpportunity');
    Route::post('/opportunity/account/add-notes', 'OpportunityController@addNotes');
    Route::post('/opportunity/account/add-file', 'OpportunityController@addAccountFile');
    Route::get('/opportunity/account/get_won_opportunity/{name}', 'OpportunityController@getAccountWonOpportunity');
    Route::get('/opportunity/account/get_pipeline/{name}', 'OpportunityController@getAccountPipeline');

//Contact Opportunity Routes
    Route::get('/opportunity/contact/details/{id}', 'OpportunityController@contactOpportunityDetails');
    Route::post('/opportunity/contact/edit', 'OpportunityController@editContactOpportunity');
    Route::get('/opportunity/contact/delete/{id}', 'OpportunityController@deleteContactOpportunity');
    Route::post('/opportunity/contact/add-notes', 'OpportunityController@addNotes');
    Route::post('/opportunity/contact/add-file', 'OpportunityController@addContactFile');
    Route::get('/opportunity/contact/get_won_opportunity/{name}', 'OpportunityController@getContactWonOpportunity');
    Route::get('/opportunity/contact/get_pipeline/{name}', 'OpportunityController@getContactPipeline');

});




