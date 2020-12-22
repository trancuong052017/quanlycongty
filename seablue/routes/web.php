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
	'as'=>'domu',
	'uses'=>'PageController@domu']);
Route::get('/oteviracidoba', [
	'as'=>'oteviracidoba',
	'uses'=>'PageController@otevira']);
Route::get('/rozvoz', [
	'as'=>'rozvoz',
	'uses'=>'PageController@rozvoz']);
Route::get('jidelni-list', [
	'as'=>'jidelni-list',
	'uses'=>'PageController@jidelni']);
Route::get('/fotky', [
	'as'=>'fotky',
	'uses'=>'PageController@fotky']);
Route::get('/kontakt', [
	'as'=>'kontakt',
	'uses'=>'PageController@kontakt']);
Route::get('/menu', [
	'as'=>'mennu',
	'uses'=>'PageController@menu']);
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
 Route::get('jidlo/{tenkhongdau}.{id}.html','PageController@getJidlo' );
/////////////////////////////////////////////
Route::get('admin/dangky','AdminController@getThem' );
		
/*Route::post('admin/dangky','AdminController@postThem' );*/
		
Route::get('admin/dangnhap','AdminController@getDangnhapAdmin' );
Route::post('admin/dangnhap','AdminController@postDangnhapAdmin' );
Route::get('admin/dangxuat','AdminController@getDangXuatAdmin' );
//////////////////////////////////admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	     Route::get('trangchu','AdminController@getMenu' );
 //////////////////////////////////////////
	      Route::post('dangky','AdminController@postThem' ); 
	    Route::get('menu/xoa/{id}','AdminController@xoaMenu' );
	     Route::get('menu/them','AdminController@getThemMenu' );
		
		Route::post('menu/them','AdminController@postThemMenu' );
			
//////////////////////////////////////////////////////
		 Route::get('jidlo/xoa/{id}','AdminController@xoaJidlo' );
	     Route::get('jidlo/them','AdminController@getThemJidlo' );
		
		Route::post('jidlo/them','AdminController@postThemJidlo' );
		Route::get('jidlo/danhsach','AdminController@getJidloDanhsach' );
		////////////////////////////////////////////
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


	




