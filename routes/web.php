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
    return redirect('admin/dangnhap');
});


Route::get('admin/dangnhap', 'UserController@getDangnhap');
Route::post('admin/dangnhap','UserController@postDangnhap');
Route::get('admin/dangxuat', 'UserController@getDangxuat');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('layout/index','UserController@index');
   Route::group(['prefix'=>'user'],function (){
      Route::get('danhsach/{idNhaHang}','UserController@getDanhsach');

      Route::get('them','UserController@getThem');
      Route::post('them','UserController@postThem');

      Route::get('sua/{id}','UserController@getSua');
      Route::post('sua/{id}','UserController@postSua');

      Route::get('xoa/{id}','UserController@getXoa');

      Route::get('khoa/{idNhanVien}','UserController@getKhoa');
      Route::get('mokhoa/{idNhanVien}','UserController@getMoKhoa');
   });

   Route::group(['prefix'=>'restaurant'],function (){
      Route::get('danhsach','RestaurantController@getDanhsach');

      Route::get('them','RestaurantController@getThem');
      Route::post('them','RestaurantController@postThem');

      Route::get('sua/{id}','RestaurantController@getSua');
      Route::post('sua/{id}','RestaurantController@postSua');

      Route::get('xoa/{id}','RestaurantController@getXoa');
   });

   Route::group(['prefix'=>'container'],function(){
      Route::get('danhsach','ContainerController@getDanhsach');

      Route::get('them','ContainerController@getThem');
      Route::post('them','ContainerController@postThem');

      Route::get('sua/{id}','ContainerController@getSua');
      Route::post('sua/{id}','ContainerController@postSua');

      Route::get('xoa/{id}','ContainerController@getXoa');
   });

   Route::group(['prefix'=>'material'],function (){
      Route::get('danhsach','MaterialController@getDanhsach');

      Route::get('them','MaterialController@getThem');
      Route::post('them','MaterialController@postThem');

      Route::get('sua/{id}','MaterialController@getSua');
      Route::post('sua/{id}','MaterialController@postSua');
   });

   Route::group(['prefix'=>'food'],function(){
      Route::get('danhsach','FoodController@getDanhsach');

      Route::get('them','FoodController@getThem');
      Route::post('them','FoodController@postThem');

      Route::get('sua/{id}','FoodController@getSua');
      Route::post('sua/{id}','FoodController@postSua');

      Route::get('xoa/{id}','FoodController@getXoa');
   });

   Route::group(['prefix'=>'recipe'],function(){
      Route::get('congthuc/{id}','RecipeController@getCongThuc');

      Route::get('them/{id}','RecipeController@getThem');
      Route::post('them/{id}','RecipeController@postThem');

      Route::post('sua/{idFood}','RecipeController@postSua');
   });

   Route::group(['prefix'=>'desk'],function(){
       Route::get('danhsach','DeskController@getDanhsach');

       Route::post('order','DeskController@postOrder')->name('order');
       Route::post('payment','DeskController@postPayment')->name('payment-desk');

       Route::get('them','DeskController@getThem');
       Route::post('them','DeskController@postThem');

       Route::get('sua/{idBan}','DeskController@getSua');
       Route::post('sua/{idBan}','DeskController@postSua');

       Route::get('xoa/{idBan}','DeskController@getxoa');
   });

   Route::group(['prefix'=>'order'],function (){
      Route::get('danhsach','OrderController@getDanhsach');
      Route::get('detail/{id}','OrderController@getDetail');

      Route::get('tao','OrderController@getTao');
      Route::post('tao','OrderController@postTao');

      Route::post('payment','OrderController@postPayment')->name('payment-order-detail');

   });

   Route::group(['prefix'=>'statistic'],function(){
      Route::get('danhsach','RevenueController@getDanhsach');

      Route::get('homnay','RevenueController@getHomnay');

      Route::get('thangnay','RevenueController@getThangnay');

       Route::get('namnay','RevenueController@getNamnay');

       Route::get('user','RevenueController@getUser');
       Route::post('user','RevenueController@postUser')->name('filter-revenue-order-user');
   });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
