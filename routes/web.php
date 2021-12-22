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
Route::group(['middleware' => 'prevent-back-history'],function(){
    
    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');

//============ Account route ============
     Route::resource('account', 'AccountController', [
        'names' => [
            'index' => 'account',
            'create' => 'new-account',
            'store'  =>'insert-account',
            'edit'   =>'edit-account',
            'update'   =>'update-account',
            'destroy'   =>'delete-account'
            // etc...
            ]
        ]);
//============ Invoice route ============
    Route::resource('invoice', 'InvoiceController', [
        'names' => [
            'index' => 'greenland-invoices',
            'create' => 'new-greenland-invoice',
            'store'  =>'insert-greenland-invoice',
            'edit'   =>'edit-greenland-invoice',
            'update'   =>'update-greenland-invoice',
            'destroy'   =>'delete-greenland-invoice'
            ]
        ]);
    Route::resource('al-amin-invoice', 'AlaminInvoiceController', [
        'names' => [
            'index' => 'al-amin-invoices',
            'create' => 'new-al-amin-invoice',
            'store'  =>'insert-al-amin-invoice',
            'edit'   =>'edit-al-amin-invoice',
            'update'   =>'update-al-amin-invoice',
            'destroy'   =>'delete-al-amin-invoice'
            ]
        ]);

    Route::resource('meridian-invoice', 'MeridianInvoiceController', [
        'names' => [
            'index' => 'meridian-invoices',
            'create' => 'new-meridian-invoice',
            'store'  =>'insert-meridian-invoice',
            'edit'   =>'edit-meridian-invoice',
            'update'   =>'update-meridian-invoice',
            'destroy'   =>'delete-meridian-invoice'
            ]
        ]);
    //============ masuo route  ============
     Route::resource('masuo-invoice', 'MasuoInvoiceController', [
        'names' => [
            'index' => 'masuo-invoices',
            'create' => 'new-masuo-invoice',
            'store'  =>'insert-masuo-invoice',
            'edit'   =>'edit-masuo-invoice',
            'update'   =>'update-masuo-invoice',
            'destroy'   =>'delete-masuo-invoice'
            ]
        ]);
        //============ bakari route  ============
      Route::resource('bakari-invoice', 'BakariInvoiceController', [
        'names' => [
            'index' => 'bakari-invoices',
            'create' => 'new-bakari-invoice',
            'store'  =>'insert-bakari-invoice',
            'edit'   =>'edit-bakari-invoice',
            'update'   =>'update-bakari-invoice',
            'destroy'   =>'delete-bakari-invoice'
            ]
        ]);
    //============ Invoice route PDF ============
    Route::get('invoice-pdf/{id}','PDFInvoiceController@generateInvoicePDF')->name('invoice-pdf');
    //============ Invoice route PDF ============
    Route::get('schedule-pdf/{id}','PDFInvoiceController@generateSchedulePDF')->name('schedule-pdf');
    //============ Invoice route PDF============
    Route::get('recipient-pdf/{id}','PDFInvoiceController@generateRecipientPDF')->name('recipient-pdf');
//============ letter route PDF ============
    Route::get('letter-pdf/{id}','PDFInvoiceController@generateLetterPDF')->name('letter-pdf');


//============ Alamin Invoice route PDF ============
    Route::get('alamin-invoice-pdf/{id}','PDFInvoiceController@generateAlminInvoicePDF')->name('alamin-invoice-pdf');
    //============ Alamin Invoice route PDF ============
    Route::get('alamin-invoice-dollar-pdf/{id}','PDFInvoiceController@generateAlaminInvoiceDollarPDF')->name('alamin-invoice-dollar-pdf');
    //============ Alamin Invoice route PDF ============
    Route::get('alamin-schedule-pdf/{id}','PDFInvoiceController@generateAlaminScheduleInvoicePDF')->name('alamin-schedule-pdf');
    //============ Alamin Invoice route PDF============
    Route::get('alamin-tax-pdf/{id}','PDFInvoiceController@generateAlaminTaxPDF')->name('alamin-tax-pdf');

//============ meridian Invoice route PDF ============
    Route::get('meridian-invoice-pdf/{id}','PDFInvoiceController@generateMeridianInvoicePDF')->name('meridian-invoice-pdf');
    //============ meridian Invoice route PDF ============
    Route::get('meridian-schedule-pdf/{id}','PDFInvoiceController@generateMeridianScheduleInvoicePDF')->name('meridian-schedule-pdf');
    //============ meridian Invoice route PDF============
    Route::get('meridian-tax-pdf/{id}','PDFInvoiceController@generateMeridianTaxPDF')->name('meridian-tax-pdf');

//============ masuo Invoice route PDF ============
    Route::get('masuo-invoice-pdf/{id}','PDFInvoiceController@generateMasuoInvoicePDF')->name('masuo-invoice-pdf');
    //============ meridian Invoice route PDF ============
    Route::get('masuo-schedule-pdf/{id}','PDFInvoiceController@generateMasuoScheduleInvoicePDF')->name('masuo-schedule-pdf');
    //============ meridian Invoice route PDF============
    Route::get('masuo-tax-pdf/{id}','PDFInvoiceController@generateMasuoTaxPDF')->name('masuo-tax-pdf');
//============ Bakari Invoice route PDF ============
    Route::get('bakari-invoice-pdf/{id}','PDFInvoiceController@generateBakariInvoicePDF')->name('bakari-invoice-pdf');
    //============ meridian Invoice route PDF ============
    Route::get('bakari-schedule-pdf/{id}','PDFInvoiceController@generateBakariScheduleInvoicePDF')->name('bakari-schedule-pdf');
    //============ meridian Invoice route PDF============
    Route::get('bakari-tax-pdf/{id}','PDFInvoiceController@generateBakariTaxPDF')->name('bakari-tax-pdf');

//============ letter route ============
    Route::resource('letter', 'LetterController', [
        'names' => [
            'index' => 'letters',
            'create' => 'new-letter',
            'store'  =>'insert-letter',
            'edit'   =>'edit-letter',
            'update'   =>'update-letter',
            'destroy'   =>'delete-letter'
            ]
        ]);
     Route::resource('rate', 'RateController', [
        'names' => [
            'create' => 'new-rate',
            'store'  =>'insert-rate',
            'update'   =>'update-rate',
            'destroy'   =>'delete-letter'
            ]
        ]);

});