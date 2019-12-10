<?php
Auth::routes();
Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('/home',function () {
    return redirect()->route('dashboard.index');
})->name('home');

Route::namespace('Admin')->prefix('backend')->middleware('auth')->group(function(){

    Route::get('dashboard','Dashboard@index')->name('dashboard.index');

    // Groups Routes
    Route::resource('groups','Groups');
    Route::post('groups/print','Groups@print')->name('groups.print');

    // Users Routes
    Route::resource('users','Users');
    Route::post('users/print','Users@print')->name('users.print');

    // suppliers Routes
    Route::resource('suppliers','Suppliers');
    Route::post('suppliers/print','Suppliers@print')->name('suppliers.print');
    Route::get('suppliers/{id}/profile','Suppliers@profile')->name('suppliers.profile');
    Route::post('suppliers/savebalance','Suppliers@saveBalance')->name('suppliers.saveBalance');

    // Box Routes
    Route::resource('boxes','Boxs');
    Route::post('boxes/print','Boxs@print')->name('boxes.print');

    // Categories Routes
    Route::resource('categories','Categories');
    Route::post('categories/print','Categories@print')->name('categories.print');

    // UNITS Routes
    Route::resource('units','Units');
    Route::post('units/print','Units@print')->name('units.print');

    // products Routes
    Route::resource('products','Products');
    Route::post('products/print','Products@print')->name('products.print');

    // OtherInvoices Routes
    Route::resource('otherinvoices','OtherInvoices');
    Route::post('otherinvoices/print','OtherInvoices@print')->name('otherinvoices.print');


    // purchaseInvoice Routes

    Route::get('PurchaseInvoice/List','PurchaseInvoice@index')->name('purchaseInvoice.index');
    Route::get('PurchaseInvoice/Create','PurchaseInvoice@create')->name('purchaseInvoice.create');
    Route::get('PurchaseInvoice/{id}/Edit','PurchaseInvoice@edit')->name('purchaseInvoice.edit');
    Route::post('PurchaseInvoice/Add','PurchaseInvoice@store')->name('purchaseInvoice.store');
    Route::put('PurchaseInvoice/{id}/Update','PurchaseInvoice@update')->name('purchaseInvoice.update');
    Route::delete('PurchaseInvoice/{id}/Delet','PurchaseInvoice@destroy')->name('purchaseInvoice.delete');
    Route::post('PurchaseInvoice/print','PurchaseInvoice@print')->name('PurchaseInvoice.print');
    Route::get('PurchaseInvoice/{id}/singleInvoice','PurchaseInvoice@show')->name('purchaseInvoice.show');
    Route::get('PurchaseInvoice/{id}/printSingleInvoice','PurchaseInvoice@printSingleInvoice')->name('purchaseInvoice.printSingleInvoice');
    Route::post('getCategoryProducts','PurchaseInvoice@getCategoryProducts')->name('getCategoryProducts');


    // sellInvoice Routes

    Route::get('sellInvoice/List','SellInvoice@index')->name('sellInvoice.index');
    Route::get('sellInvoice/Create','SellInvoice@create')->name('sellInvoice.create');
    Route::get('sellInvoice/{id}/Edit','SellInvoice@edit')->name('sellInvoice.edit');
    Route::post('sellInvoice/Add','SellInvoice@store')->name('sellInvoice.store');
    Route::put('sellInvoice/{id}/Update','SellInvoice@update')->name('sellInvoice.update');
    Route::delete('sellInvoice/{id}/Delet','SellInvoice@destroy')->name('sellInvoice.delete');
    Route::post('sellInvoice/print','SellInvoice@print')->name('sellInvoice.print');
    Route::get('sellInvoice/{id}/singleInvoice','SellInvoice@show')->name('sellInvoice.show');
    Route::get('sellInvoice/{id}/printSingleInvoice','SellInvoice@printSingleInvoice')->name('sellInvoice.printSingleInvoice');
    Route::post('ajaxgetProductInfo','SellInvoice@getProductInfo')->name('getProductInfo');
    Route::post('ajaxgetProductInfoByCode','SellInvoice@getProductInfoByCode')->name('getProductInfoByCode');
    Route::get('totalgainindex','SellInvoice@totalgainindex')->name('totalgainindex.index');

    // Students Routs
    Route::resource('students','StudentController');
    Route::post('students/print','StudentController@print')->name('students.print');

    // Offers Routes
    Route::resource('offers','Offers');
    Route::post('offers/print','Offers@print')->name('offers.print');

    // Reservations Routes
    Route::resource('reservations', 'Reservations');
    Route::post('reservations/print','Reservations@print')->name('reservations.print');

    // Patients Routes
    Route::resource('patients', 'Patients');
    Route::post('patients/print','Patients@print')->name('patients.print');

    // Requests Routes
    Route::resource('requests', 'Requests');
    Route::get('requests/requests/{id}/edit', 'Requests@edit');

});

// Pages Payment
Route::get('/payment', 'Admin\\PaymentController@index')->name('home.payment');
Route::post('/payment/store', 'Admin\\PaymentController@store')->name('payment.store');
Route::post('/payment/{payment}/update', 'Admin\\PaymentController@update')->name('payment.update');
