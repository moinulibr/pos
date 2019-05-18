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
/*
Route::get('/', function () {
    return view('auth.login');
})->name('/'); */

Route::get('/','BaseController@index')->name('/');

Route::get('/blank',function(){
    return view('pages.blank');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*============POS With Ajax=============*/
Route::group(['namespace' => 'Pos','middleware'=>'auth'], function () {
    //--with ajax--
    Route::get('add-pos-ajax','PosajaxController@index')->name('pos.ajax');
    Route::get('show-my-cart-ajax','PosajaxController@yourcart')->name('show-my-cart');
        //add-to-cart
    Route::post('add-to-cart-ajax','PosajaxController@addToCart')->name('add.to.cart.ajax');

   // Route::post('add-pos-ajax','PosController@store')->name('pos.store.ajax');
    // add-to-cart
    //Route::get('show-cart','PosajaxController@showCart')->name('show.cart');
    
    //Route::post('remove-from-cart','PosajaxController@removeFromCart')->name('remove.from.cart');

});


/*============POS=============*/
Route::group(['namespace' => 'Pos','middleware'=>'auth'], function () {
    Route::get(md5('add-pos'),'PosController@index')->name('pos');

    Route::post('add-pos','PosController@store')->name('pos.store');
    // add-to-cart
    Route::get('show-cart','PosController@showCart')->name('show.cart');
    Route::post('add-to-cart','PosController@addToCart')->name('add.to.cart');
    Route::post('remove-from-cart','PosController@removeFromCart')->name('remove.from.cart');

    Route::get('show-pos','PosController@show')->name('pos.show');
    Route::get('edit-pos/{id}','PosController@edit')->name('pos.edit');
    Route::post('edit-pos/{id}','PosController@update')->name('pos.update');
    Route::get('delete-pos/{id}','PosController@destroy')->name('pos.delete');
});

/*============Invoice=============*/
Route::group(['namespace' => 'Invoice','middleware'=>'auth'], function () {
    Route::post('add-invoice','InvoiceController@index')->name('invoice');
    Route::post('create-invoice','InvoiceController@store')->name('invoice.store');
        // print option
    Route::get('show-print-invoice/{id}','InvoiceController@printInvoice')->name('invoice.print');

        //download and PDF
    Route::get('pdf-download-invoice/{id}','InvoiceController@pdfDownloadInvoice')->name('invoice.pdf.download');

    //Route::get('show-invoice/{id}','InvoiceController@show')->name('invoice.show');
    Route::get('edit-invoice/{id}','InvoiceController@edit')->name('invoice.edit');
    Route::post('edit-invoice/{id}','InvoiceController@update')->name('invoice.update');
    Route::get('delete-invoice/{id}','InvoiceController@destroy')->name('invoice.delete');

    Route::get('/print','InvoiceController@print');
    Route::get('/printPreview','InvoiceController@printPreview');
});



/*============Order=============*/
Route::group(['namespace' => 'Order','middleware'=>'auth'], function () {
    Route::get('all-pending-orders','OrderController@index')->name('pending.order');
    Route::get('show-pending-single-order/{id}','OrderController@showPendingSingleOrder')->name('pending.show');
    Route::get('approve-order/{id}','OrderController@approved')->name('order.approve');
    Route::get('all-success-order','OrderController@showSuccessOrder')->name('order.success');
    Route::get('show-success-single-order/{id}','OrderController@successSingleOrder')->name('order.success.single');
});


/*============Employee=============*/
Route::group(['namespace' => 'Employee','middleware'=>'auth'], function () {
    Route::get('add-employee','EmployeeController@index')->name('employee');
    Route::post('add-employee','EmployeeController@store')->name('employee.store');
    Route::get('show-employee','EmployeeController@show')->name('employee.show');
    Route::get('edit-employee/{id}','EmployeeController@edit')->name('employee.edit');
    Route::post('edit-employee/{id}','EmployeeController@update')->name('employee.update');
    Route::get('delete-employee/{id}','EmployeeController@destroy')->name('employee.delete');
});

/*============Customer=============*/
Route::group(['namespace' => 'Customer','middleware'=>'auth'], function () {
    Route::get('add-customer','CustomerController@index')->name('customer');
    Route::post('add-customer','CustomerController@store')->name('customer.store');
    Route::get('show-customer','CustomerController@show')->name('customer.show');
    Route::get('edit-customer/{id}','CustomerController@edit')->name('customer.edit');
    Route::post('edit-customer/{id}','CustomerController@update')->name('customer.update');
    Route::get('delete-customer/{id}','CustomerController@destroy')->name('customer.delete');
});


/*============Supplier Types=============*/
Route::group(['namespace' => 'Supplier','middleware'=>'auth'], function () {
    Route::get('add-supplier-type','SuppliertypeController@index')->name('suppliertype');
    Route::post('add-supplier-type','SuppliertypeController@store')->name('suppliertype.store');
    Route::get('show-supplier-type','SuppliertypeController@show')->name('suppliertype.show');
    Route::get('edit-supplier-type/{id}','SuppliertypeController@edit')->name('suppliertype.edit');
    Route::post('edit-supplier-type/{id}','SuppliertypeController@update')->name('suppliertype.update');
    Route::get('delete-supplier-type/{id}','SuppliertypeController@destroy')->name('suppliertype.delete');
});


/*============Supplier=============*/
Route::group(['namespace' => 'Supplier','middleware'=>'auth'], function () {
    Route::get('add-supplier','SupplierController@index')->name('supplier');
    Route::post('add-supplier','SupplierController@store')->name('supplier.store');
    Route::get('show-supplier','SupplierController@show')->name('supplier.show');
    Route::get('edit-supplier/{id}','SupplierController@edit')->name('supplier.edit');
    Route::post('edit-supplier/{id}','SupplierController@update')->name('supplier.update');
    Route::get('delete-supplier/{id}','SupplierController@destroy')->name('supplier.delete');
});

/*============Category=============*/
Route::group(['namespace' => 'Category','middleware'=>'auth'], function () {
    Route::get('add-category','CategoryController@index')->name('category');
    Route::post('add-category','CategoryController@store')->name('category.store');
    Route::get('show-category','CategoryController@show')->name('category.show');
    Route::get('edit-category/{id}','CategoryController@edit')->name('category.edit');
    Route::post('edit-category/{id}','CategoryController@update')->name('category.update');
    Route::get('delete-category/{id}','CategoryController@destroy')->name('category.delete');

    Route::get('all/category-product/{id}','CategoryController@allshow');

    Route::get('total-product-by-category/{id}','CategoryController@allshowproduct')->name('total_product_by_category');
});


/*============Product=============*/
Route::group(['namespace' => 'Product','middleware'=>'auth'], function () {
    Route::get(md5('add-product'),'ProductController@index')->name('product');
    Route::post('add-product','ProductController@store')->name('product.store');
    Route::get('show-product','ProductController@show')->name('product.show');
    Route::get('show-single-product/{id}','ProductController@showSingleProduct')->name('product.single.show');
    Route::get('warehouse-no','ProductController@getWarehouse_id')->name('warehouse_id');
    Route::get('warehouse-no-selected','ProductController@getWarehouse_id_selected')->name('warehouse_id_selected');
    Route::get('edit-product/{id}','ProductController@edit')->name('product.edit');
    Route::post('edit-product/{id}','ProductController@update')->name('product.update');
    Route::get('delete-product/{id}','ProductController@destroy')->name('product.delete');
});


/*============Warehouses=============*/
Route::group(['namespace' => 'Warehouse','middleware'=>'auth'], function () {
    Route::get('add-warehouse','WarehouseController@index')->name('warehouse');
    Route::post('add-warehouse','WarehouseController@store')->name('warehouse.store');
    Route::get('show-warehouse','WarehouseController@show')->name('warehouse.show');
    Route::get('edit-warehouse/{id}','WarehouseController@edit')->name('warehouse.edit');
    Route::post('edit-warehouse/{id}','WarehouseController@update')->name('warehouse.update');
    Route::get('delete-warehouse/{id}','WarehouseController@destroy')->name('warehouse.delete');

    Route::get('total-product-by-warehouse/{id}','WarehouseController@allshowproduct_by_warehouse')->name('total_product_by_warehouse');
});

/*============Warehouses Section=============*/
Route::group(['namespace' => 'Warehouse','middleware'=>'auth'], function () {
    Route::get('add-warehouse-section','Warehouse_sectionController@index')->name('warehouse_section');
    Route::post('add-warehouse-section','Warehouse_sectionController@store')->name('warehouse_section.store');
    Route::get('show-warehouse-section','Warehouse_sectionController@show')->name('warehouse_section.show');
    Route::get('edit-warehouse-section/{id}','Warehouse_sectionController@edit')->name('warehouse_section.edit');
    Route::post('edit-warehouse-section/{id}','Warehouse_sectionController@update')->name('warehouse_section.update');
    Route::get('delete-warehouse-section/{id}','Warehouse_sectionController@destroy')->name('warehouse_section.delete');

    Route::get('total-product-by-warehouse/{id}/{wid}','Warehouse_sectionController@allshowproduct_by_warehouse_warehouseSection')->name('total_product_by_warehouse_wareSection');

});

/*============Bangladesh Section=============*/
Route::group(['namespace' => 'Pos','middleware'=>'auth'], function () {
    Route::get('bangladesh','PosController@Bangladesh')->name('bangladesh');
    Route::get('bangladesh-division','PosController@Bangladesh_div')->name('bangladesh.division');
});

