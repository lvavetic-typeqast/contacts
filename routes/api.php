<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// contacts
$router->get('contacts/', 'ContactController@index');
$router->get('contacts/favourite', 'ContactController@favourite');
$router->get('contact/{id}/', 'ContactController@show');
$router->post('contact/', 'ContactController@insert');
$router->post('contact_search/', 'ContactController@search');
$router->put('contact/{id}/', 'ContactController@update');
$router->delete('contact/{id}/', 'ContactController@delete');

//phone numbers
$router->get('phone-numbers/', 'PhoneNumberController@index');
$router->get('phone-number/{id}/', 'PhoneNumberController@show');
$router->post('phone-number/', 'PhoneNumberController@insert');
$router->put('phone-number/{id}/', 'PhoneNumberController@update');
$router->delete('phone-number/{id}/', 'PhoneNumberController@delete');