<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/quenmatkhau', [
	'as'=>'quen-mat khau',
	'uses'=>'PageController@getquen_mat_khau']);
Route::post('/quen_mat_khau', [
	'as'=>'quen-mat khau',
	'uses'=>'PageController@postquen_mat_khau']);
Route::get('/', [
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex']);
Route::get('/index', [
	'as'=>'trang-chu',
	'uses'=>'pageController@GetIndex']);
Route::get('/loai-san-pham/{type}', [
	'as'=>'loai-san-pham',
	'uses'=>'pageController@GetLoaiSanPham']);
Route::get('/san-pham/{id}', [
	'as'=>'san-pham',
	'uses'=>'pageController@GetSanPham']);
Route::get('/lien-he', [
	'as'=>'lien-he',
	'uses'=>'pageController@GetLienHe']);
Route::get('/gioi-thieu', [
	'as'=>'gioi-thieu',
	'uses'=>'pageController@GetGioiThieu']);
Route::post('/shoping_cart', [
	'as'=>'shoping_cart',
	'uses'=>'Cartcontroller@Save_cart']);
Route::get('/xoa_giohang/{rowId}', [
	'as'=>'xoa_giohang',
	'uses'=>'Cartcontroller@delete_cart']);


Route::get('/show_cart', [
	'as'=>'show_cart',
	'uses'=>'Cartcontroller@show_cart']);
Route::post('update_cart',[
	'as'=>'update_cart',
	'uses'=>'Cartcontroller@update_cart']);
Route::get('dathang',[
	'as'=>'dathang',
	'uses'=>'Cartcontroller@getdathang']);
Route::post('dathang',[
	'as'=>'dathang',
	'uses'=>'Cartcontroller@postdathang']);
/////////////////////////////////////////////
Route::get('admin/dangky','UserController@getThem' );
		
Route::post('admin/dangky','UserController@postThem' );
		
Route::get('admin/dangnhap','UserController@getDangnhapAdmin' );
Route::post('admin/dangnhap','UserController@postDangnhapAdmin' );
Route::get('admin/dangxuat','UserController@getDangXuatAdmin' );
//////////////////////////////////admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	     Route::get('trangchu','TrangchuController@getXem' );
 //////////////////////////////////////////
	       Route::group(['prefix'=>'giohang'], function(){

	    Route::get('xem/{id}','BillController@getXem' );
	     Route::get('xuathang/{id}','BillController@getXuathang' );
		
		Route::get('xoa/{id}','BillController@getXoa' );
			});
////////////////////////////////////////////////////////////////
         Route::group(['prefix'=>'user'], function(){

	    Route::get('danhsach','UserController@getDanhSach' );
	    
		
		Route::get('sua/{id}','UserController@getSua' );
		
		
		Route::post('sua/{id}','UserController@postSua');
		
		
		Route::get('xoa/{id}','UserController@getXoa' );
		
		Route::get('them','UserController@getThem' );
		
		
		Route::post('them','UserController@postThem' );
		
		
		});
	    Route::group(['prefix'=>'type_product'], function(){
		Route::get('danhsach','type_productController@getDanhSach' );
		
		
		Route::get('sua/{id}','type_productController@getSua' );
		
		Route::post('sua/{id}','type_productController@postSua' );
		
		Route::get('them','type_productController@getThem' );
		
	    Route::get('xoa/{id}','type_productController@getXoa' );
	    
	    Route::post('them','type_productController@postThem');
	    
	   });

	     Route::group(['prefix'=>'comment'], function(){
		Route::get('danhsach','CommentController@getDanhSach' );
		
		
		Route::get('xoa/{id}','CommentController@getXoa' );
		
	  
	
	});

				Route::group(['prefix'=>'product'], function(){
			Route::get('danhsach','ProductController@getDanhSach' );
			      
			Route::get('sua/{id}','ProductController@getSua' );
			        
		Route::post('sua/{id}','ProductController@postSua' );
			       
			Route::get('them','ProductController@getThem' );
			       
			Route::get('xoa/{id}','ProductController@getXoa' );
			       
			Route::post('them','ProductController@postThem');
			         
				
				});

       Route::group(['prefix'=>'tintuc'], function(){
	    Route::get('danhsach','TinTucController@getDanhSach' )
	    ->middleware('can:tintuc.danhsach');
	
		Route::get('sua/{id}','TinTucController@getSua' )
		->middleware('can:tintuc.sua');
	
         Route::post('sua/{id}','TinTucController@postSua')
         ->middleware('can:tintuc.sua');
	
		Route::get('xoa/{id}','TinTucController@getXoa' )
		->middleware('can:tintuc.xoa');
	
		
		Route::get('them','TinTucController@getThem' )
		->middleware('can:tintuc.them');
		Route::post('them','TinTucController@postThem' )
		->middleware('can:tintuc.them');
		});
   });


	




