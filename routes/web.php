<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
//test route start


//test route end





//frontend start

// Route::view('abc'');
// Route::get('abc','FrontController@abc_func');

Route::view('admin_login','admin.auth.login');
//Route::view('admin_login','frontend.index2');
Route::post('admin_login','AdminController@login')->name('admin_login');

Route::group(['middleware' => 'IsAdmin'], function()
{
    Route::get('/','AdminController@show_dashboard');
    //Route::view('/','frontend.index2');
    Route::get('logout_admin','AdminController@logout')->name('logout_admin');

    //Report Start
    Route::get('report/{type}','ReportController@report_view');
    Route::get('show_order_report','ReportController@show_order_report')->name('show_order_report');
    Route::post('show_all_report','ReportController@show_all_report')->name('show_all_report');

    //


     //category start
     Route::get('show-all-category','CategoryController@show_all_category')->name('show-all-category');
     Route::get('add-category','CategoryController@add_category_ui');
     Route::post('add-category','CategoryController@add_category')->name('add-category');
     Route::get('category_active_status_update/{id}','CategoryController@category_active_status_update');
     Route::get('edit_category_content/{id}','CategoryController@edit_category_content_ui')->name('edit_category_content');
     Route::post('update_category_content','CategoryController@update_category_content')->name('update_category_content');
     Route::get('category_content_delete/{id}','CategoryController@category_content_delete')->name('category_content_delete');
     Route::get('edit_category_image/{id}','CategoryController@edit_category_image_ui')->name('edit_category_image');
     Route::post('update_category_image','CategoryController@update_category_image')->name('update_category_image');

     //category end

     //brand start
     Route::get('show-all-brand','BrandController@show_all_brand')->name('show-all-brand');
     Route::get('add-brand','BrandController@add_brand_ui');
     Route::post('add-brand','BrandController@add_brand')->name('add-brand');
     Route::get('brand_active_status_update/{id}','BrandController@brand_active_status_update');
     Route::get('edit_brand_content/{id}','BrandController@edit_brand_content_ui')->name('edit_brand_content');
     Route::post('update_brand_content','BrandController@update_brand_content')->name('update_brand_content');
     Route::get('brand_content_delete/{id}','BrandController@brand_content_delete')->name('brand_content_delete');
     Route::get('edit_brand_image/{id}','BrandController@edit_brand_image_ui')->name('edit_brand_image');
     Route::post('update_brand_image','BrandController@update_brand_image')->name('update_brand_image');

     //brand end




      //sub category start

      Route::get('show-all-sub-category','SubCategoryController@show_all_sub_category')->name('show-all-sub-category');
      Route::get('add-sub_category','SubCategoryController@add_sub_category_ui');
      Route::post('add-sub_category','SubCategoryController@add_sub_category')->name('add-sub_category');
      Route::get('sub_category_active_status_update/{id}','SubCategoryController@sub_category_active_status_update');
      Route::get('edit_sub_category_content/{id}','SubCategoryController@edit_sub_category_content_ui')->name('edit_sub_category_content');
      Route::post('update_sub_category_content','SubCategoryController@update_sub_category_content')->name('update_sub_category_content');
      Route::get('sub_category_content_delete/{id}','SubCategoryController@sub_category_content_delete')->name('sub_category_content_delete');
      Route::get('edit_sub_category_image/{id}','SubCategoryController@edit_sub_category_image_ui')->name('edit_sub_category_image');
      Route::post('update_sub_category_image','SubCategoryController@update_sub_category_image')->name('update_sub_category_image');

      //sub category end

      //prodcut start
      Route::get('get_category','ProductController@get_category')->name('get_category');
      Route::post('get_sub_category','ProductController@get_sub_category')->name('get_sub_category');
      Route::post('get_brand','ProductController@get_brand')->name('get_brand');
      Route::get('show-all-product','ProductController@show_all_product')->name('show-all-product');
      Route::get('get_all_product','ProductController@get_all_product')->name('get_all_product');
      Route::get('add-product','ProductController@add_product_ui');
      Route::post('add-product','ProductController@add_product')->name('add-product');
      Route::get('product_active_status_update/{id}','ProductController@product_active_status_update');
      Route::get('edit_product_content/{id}','ProductController@edit_product_content_ui')->name('edit_product_content');
      Route::post('update_product_content','ProductController@update_product_content')->name('update_product_content');
      Route::get('product_content_delete/{id}','ProductController@product_content_delete')->name('product_content_delete');
      Route::get('edit_product_image/{id}','ProductController@edit_product_image_ui')->name('edit_product_image');
      Route::post('update_product_image','ProductController@update_product_image')->name('update_product_image');
      Route::get('show-all-product-field','ProductController@show_all_product_field')->name('show-all-product-field');
      Route::get('product_required_field_active_status_update/{id}','ProductController@product_required_field_active_status_update')->name('product_required_field_active_status_update');
      Route::post('get_product_update_modal','ProductController@get_product_update_modal');
      Route::post('update_product_value','ProductController@update_product_value')->name('update_product_value');
      Route::get('product_content_delete/{id}','ProductController@product_content_delete')->name('product_content_delete');
      Route::post('product_import','ProductController@product_import')->name('product_import');

      //product end

      //purchase start
      Route::post('add-purchase','PurchaseController@add_purchase')->name('add-purchase');
      Route::get('add-purchase','PurchaseController@add_purchase_ui');
      Route::get('show-all-purchase','PurchaseController@show_all_purchase')->name('show-all-purchase');
      Route::get('edit_purchase_content/{id}','PurchaseController@edit_purchase_content_ui');
      Route::post('update_purchase','PurchaseController@update_purchase')->name('update_purchase');

      //purchase end



      //homepgae_content_start
      Route::get('show-all-homepage_section','HomepageContentController@show_all_homepage_section')->name('show-all-homepage_section');
      Route::get('add-homepage-section','HomepageContentController@add_homepage_section_ui');
      Route::post('add-homepage-section','HomepageContentController@add_homepage_section')->name('add-homepage-section');
      Route::get('homepage-section_active_status_update/{id}','HomepageContentController@homepage_section_active_status_update');
      Route::get('edit_homepage-section_content/{id}','HomepageContentController@edit_homepage_section_content_ui')->name('edit_homepage-section_content');
      Route::post('update_homepage-section_content','HomepageContentController@update_homepage_section_content')->name('update_homepage-section_content');
      Route::get('homepage-section_content_delete/{id}','HomepageContentController@homepage_section_content_delete')->name('homepage-section_content_delete');
      Route::get('edit_homepage-section_image/{id}','HomepageContentController@edit_homepage_section_image_ui')->name('edit_homepage-section_image');
      Route::post('update_homepage-section_image','HomepageContentController@update_homepage_section_image')->name('update_homepage-section_image');
      Route::post('update_homepage_content_order','HomepageContentController@update_homepage_content_order')->name('update_homepage_content_order');
      Route::get('change_retailer_priority/{id}','HomepageContentController@change_retailer_priority')->name('change_retailer_priority');
      Route::post('update_retailer_order','HomepageContentController@update_retailer_order')->name('update_retailer_order');
      //homepage_content_end

      //product add to section start
        Route::get('product-add-to-section/{id}','HomepageContentController@product_add_to_section_ui')->name('product-add-to-section');
        Route::post('add-retailer-to-section','HomepageContentController@add_retailer_to_section')->name('add-retailer-to-section');
        Route::post('update-product-to-section','HomepageContentController@update_product_to_section')->name('update-product-to-section');
        Route::get('get_all_homepage_section_retailer/{id}','HomepageContentController@get_all_homepage_section_retailer')->name('get_all_homepage_section_product');
        Route::get('delete_retailer_from_section/{id}','HomepageContentController@delete_retailer_from_section')->name('delete_retailer_from_section');
        Route::get('get_all_retailer_list/{id}','HomepageContentController@get_all_retailer_list')->name('get_all_product_list');

    //product add to section end

    //package start
        Route::get('add-package','PackageController@add_package_ui');
        Route::post('add-package','PackageController@add_package')->name('add-package');
        Route::get('show_all_package','PackageController@show_all_package')->name('show_all_package');
        Route::get('product-add-to-package/{id}','PackageController@product_add_to_package_ui');
        Route::get('get_all_package_product/{id}','PackageController@get_all_package_product');
        Route::post('add-product-to-package','PackageController@add_product_to_package')->name('add-product-to-package');
        Route::get('delete_product_from_package/{id}','PackageController@delete_product_from_package');
        Route::get('package_active_status_update/{id}','PackageController@package_active_status_update');
        Route::get('edit_package_content/{id}','PackageController@edit_package_content_ui');
        Route::post('update-package-content','PackageController@update_package_content')->name('update-package-content');
        Route::get('edit_package_image/{id}','PackageController@edit_package_image_ui');
        Route::post('update_package_image','PackageController@update_package_image')->name('update_package_image');
        Route::get('package_content_delete/{id}','PackageController@package_content_delete');
        Route::post('update-product-to-package','PackageController@update_product_to_package');

    //package end



    //banner start
    Route::get('show-all-banner','BannerController@show_all_banner')->name('show-all-banner');
    Route::get('add-banner','BannerController@add_banner_ui');
    Route::post('add-banner','BannerController@add_banner')->name('add-banner');
    Route::get('banner_active_status_update/{id}','BannerController@banner_active_status_update');
    Route::get('edit_banner_content/{id}','BannerController@edit_banner_content_ui')->name('edit_banner_content');
    Route::post('update_banner_content','BannerController@update_banner_content')->name('update_banner_content');
    Route::get('banner_content_delete/{id}','BannerController@banner_content_delete')->name('banner_content_delete');
    Route::get('edit_banner_image/{id}','BannerController@edit_banner_image_ui')->name('edit_banner_image');
    Route::post('update_banner_image','BannerController@update_banner_image')->name('update_banner_image');
    Route::post('update_banner_order','BannerController@update_banner_order')->name('update_banner_order');
    //banner end

    //order start

    Route::get('new-order','OrderController@new_order')->name('new-order');
    Route::get('all-order','OrderController@all_order')->name('all-order');
    Route::get('show-order-product/{order_no}','OrderController@show_order_product');
    Route::get('change-order-status/{id}','OrderController@change_order_status');
    Route::post('update_order_status','OrderController@update_order_status')->name('update_order_status');

    //order end



    //All User start

    Route::get('show-all-user','UserController@show_all_user')->name('show-all-user');
    Route::get('add-user','UserController@add_user_ui');
    Route::post('add-user','UserController@add_user')->name('add-user');
    Route::get('user_active_status/{id}','UserController@user_active_status');
    Route::get('edit_user_content/{id}','UserController@edit_user_content_ui')->name('edit_user_content');
    Route::post('update_user_content','UserController@update_user_content')->name('update_user_content');
    Route::get('user_delete/{id}','UserController@user_content_delete')->name('user_delete');
    Route::get('reset_user_password/{id}','UserController@reset_user_password_ui');
    Route::post('update_user_password','UserController@update_user_password')->name('update_user_password');

   //All User end

    //Warehouse start

    Route::get('show-all-warehouse','WarehouseController@show_all_warehouse')->name('show-all-warehouse');
    Route::get('add-warehouse','WarehouseController@add_warehouse_ui');
    Route::post('add-warehouse','WarehouseController@add_warehouse')->name('add-warehouse');
    Route::get('warehouse_product_active_status/{id}','WarehouseController@warehouse_product_active_status');
    Route::get('edit_warehouse_content/{id}','WarehouseController@edit_warehouse_content_ui')->name('edit_warehouse_content');
    Route::post('update_warehouse_content','WarehouseController@update_warehouse_content')->name('update_warehouse_content');
    Route::get('warehouse_content_delete/{id}','WarehouseController@warehouse_content_delete')->name('warehouse_content_delete');
    Route::get('warehouse_product/{id}','WarehouseController@warehouse_content_delete');
    Route::post('show-warehouse-product','WarehouseController@show_warehouse_product')->name('show-warehouse-product');


   //Warehouse end

   //area start

   Route::get('show-all-area','AreaController@show_all_area')->name('show-all-area');
   Route::get('add-area','AreaController@add_area_ui');
   Route::post('add-area','AreaController@add_area')->name('add-area');
   Route::get('area_active_status_update/{id}','AreaController@area_active_status_update');
   Route::get('edit_area_content/{id}','AreaController@edit_area_content_ui')->name('edit_area_content');
   Route::post('update_area_content','AreaController@update_area_content')->name('update_area_content');
   Route::get('area_content_delete/{id}','AreaController@area_content_delete');
   Route::get('area_product/{id}','AreaController@area_content_delete')->name('area_content_delete');
   //area end

   //retailer start
   Route::get('show-all-retailer','RetailerController@show_all_retailer')->name('show-all-retailer');
   Route::get('add-retailer','RetailerController@add_retailer_ui');
   Route::post('add-retailer','RetailerController@add_retailer')->name('add-retailer');
   Route::get('retailer_active_status_update/{id}','RetailerController@retailer_active_status_update');
   Route::get('edit_retailer_content/{id}','RetailerController@edit_retailer_content_ui')->name('edit_retailer_content');
   Route::post('update_retailer_content','RetailerController@update_retailer_content')->name('update_retailer_content');

   Route::get('edit_retailer_image/{id}','RetailerController@edit_retailer_image_ui');
   Route::post('update_retailer_image','RetailerController@update_retailer_image')->name('update_retailer_image');

   Route::get('retailer_content_delete/{id}','RetailerController@retailer_content_delete');
   Route::get('retailer_product/{id}','RetailerController@retailer_content_delete')->name('retailer_content_delete');
   //retailer end

     //Expense start

     Route::get('show-all-expense','AdminController@show_all_expense')->name('show-all-expense');
     Route::get('add-expense','AdminController@add_expense_ui');
     Route::post('add-expense','AdminController@add_expense')->name('add-expense');
     Route::get('expense_active_status_update/{id}','AdminController@expense_active_status_update');
     Route::get('edit_expense_content/{id}','AdminController@edit_expense_content_ui');
     Route::post('update_expense_content','AdminController@update_expense_content')->name('update_expense_content');
     Route::get('expense_content_delete/{id}','AdminController@expense_content_delete');
     Route::get('expense_product/{id}','AdminController@expense_content_delete')->name('expense_content_delete');
     //Expense End

   //Deposit start

   Route::get('show-all-deposit','AdminController@show_all_deposit')->name('show-all-deposit');
   Route::get('add-deposit','AdminController@add_deposit_ui');
   Route::post('add-deposit','AdminController@add_deposit')->name('add-deposit');
   Route::get('deposit_active_status_update/{id}','AdminController@deposit_active_status_update');
   Route::get('edit_deposit_content/{id}','AdminController@edit_deposit_content_ui');
   Route::post('update_deposit_content','AdminController@update_deposit_content')->name('update_deposit_content');
   Route::get('deposit_content_delete/{id}','AdminController@deposit_content_delete');
   Route::get('deposit_product/{id}','AdminController@deposit_content_delete');
   //Deposit End



   //role start

   Route::get('show-all-role','RoleController@show_all_role')->name('show-all-role');
   Route::get('add-role','RoleController@add_role_ui');
   Route::post('add-role','RoleController@add_role')->name('add-role');
   Route::get('role_active_status_update/{id}','RoleController@role_active_status_update');
   Route::get('edit_role_content/{id}','RoleController@edit_role_content_ui')->name('edit_role_content');
   Route::post('update_role_content','RoleController@update_role_content')->name('update_role_content');
   Route::get('role_content_delete/{id}','RoleController@role_content_delete');
   Route::get('role_product/{id}','RoleController@role_content_delete')->name('role_content_delete');
   Route::get('permission/{id}','RoleController@show_permission_form')->name('permission');
   Route::post('set_permission','RoleController@set_permission')->name('set_permission');

   //role end

   //company info start
   Route::get('show-all-company-info','AdminController@show_all_company_info')->name('show-all-company-info');
   Route::post('add-company-info','AdminController@add_company_info')->name('add-company-info');
   //company info end

   //terms and condition start
   Route::get('show-all-terms','AdminController@show_all_terms')->name('show-all-terms');
   Route::post('add-terms','AdminController@add_terms')->name('add-terms');
   //terms and condition end

    //delivery charge start
    Route::get('show-all-dellivery-charge','AdminController@show_all_delivery_charge')->name('show-all-delivery-charge');
    Route::post('add-delivery-charge','AdminController@add_delivery_charge')->name('add-delivery-charge');
    //delivery charge



});



Route::get('update_unit','AdminController@update_unit');
Route::get('update_stock','AdminController@update_stock');

Route::view('error','error');
//URL::forceScheme('https');

