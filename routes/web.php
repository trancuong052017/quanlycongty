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
/*use App\TinTuc ;
use App\LoaiTin ;
use App\TheLoai ;
use App\User ;
use App\role ;*/
Route::get('/checkDB', function ()//kiem tra ket noi voi database
{
    dd(DB::connection()->getDatabaseName());
});
Route::get('test','TestController@getTest'); 
Route::post('test','TestController@postTest'); 
Route::get('/quenmatkhau', [
	'as'=>'quen-mat khau',
	'uses'=>'PageController@getquen_mat_khau']);
Route::post('/quen_mat_khau', [
	'as'=>'quen-mat khau',
	'uses'=>'PageController@postquen_mat_khau']);
//Auth::routes(['register' => false]);

////////////////////////////////admin
Route::get('admin/dangnhap','UserController@getDangnhapAdmin' );
Route::post('admin/dangnhap','UserController@postDangnhapAdmin' );
Route::get('admin/dangxuat','UserController@getDangXuatAdmin' );
//admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	     Route::get('trangchu/','TrangchuController@getXem' );

	    Route::group(['prefix'=>'theloai'], function(){
		Route::get('danhsach','TheLoaiController@getDanhSach' )
		->middleware('can:theloai.danhsach');
		
		Route::get('sua/{id}','TheLoaiController@getSua' )
		->middleware('can:theloai.sua');
		Route::post('sua/{id}','TheLoaiController@postSua' )
		->middleware('can:theloai.sua');
		Route::get('them','TheLoaiController@getThem' )
		->middleware('can:theloai.them');
	    Route::get('xoa/{id}','TheLoaiController@getXoa' )
	    ->middleware('can:theloai.xoa');
	    Route::post('them','TheLoaiController@postThem')
	    ->middleware('can:theloai.them');
	   });
       Route::group(['prefix'=>'duan'], function(){
		Route::get('danhsach','DuanController@getDanhSach' )
		->middleware('can:duan.danhsach');
		
		Route::get('sua/{id}','DuanController@getSua' )
		->middleware('can:duan.sua');
		Route::post('sua/{id}','DuanController@postSua' )
		->middleware('can:duan.sua');
		Route::get('them','DuanController@getThem' )
		->middleware('can:duan.them');
	    Route::get('xoa/{id}','DuanController@getXoa' )
	    ->middleware('can:duan.xoa');
	    Route::post('them','DuanController@postThem')
	    ->middleware('can:duan.them');
	   });
	     Route::group(['prefix'=>'comment'], function(){
		Route::get('danhsach','CommentController@getDanhSach' )
		->middleware('can:comment.danhsach');
		
		Route::get('xoa/{id}','CommentController@getXoa' )
		->middleware('can:comment.xoa');
	  
	
	});

				Route::group(['prefix'=>'loaitin'], function(){
			Route::get('danhsach','LoaiTinController@getDanhSach' )
			      ->middleware('can:loaitin.danhsach');
			Route::get('sua/{id}','LoaiTinController@getSua' )
			        ->middleware('can:loaitin.sua');
			Route::post('sua/{id}','LoaiTinController@postSua' )
			        ->middleware('can:loaitin.sua');
			Route::get('them','LoaiTinController@getThem' )
			        ->middleware('can:loaitin.them');
			Route::get('xoa/{id}','LoaiTinController@getXoa' )
			        ->middleware('can:loaitin.xoa');
			Route::post('them','LoaiTinController@postThem')
			          ->middleware('can:loaitin.them');
				
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

	 Route::group(['prefix'=>'ajax'], function(){
	 	//dd('halo');
	   Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	    Route::get('user/{idcongtrinh}','AjaxController@getUser');
	    
		});
	 Route::group(['prefix'=>'slide'], function(){

	 Route::get('danhsach','SlideController@getDanhSach' )
	 ->middleware('can:slide.danhsach');
		Route::get('sua/{id}','SlideController@getSua' )
		->middleware('can:slide.danhsach');
		Route::post('sua/{id}','SlideController@postSua' )
		->middleware('can:slide.sua');
		Route::get('xoa/{id}','SlideController@getXoa' )
		->middleware('can:slide.xoa');
		Route::get('them','SlideController@getThem' )
		->middleware('can:slide.them');
		Route::post('them','SlideController@postThem' )
		->middleware('can:slide.them');
		});
	 
		/////////////////////////////
		 Route::group(['prefix'=>'user'], function(){

	    Route::get('danhsach','UserController@getDanhSach' )
	    ->middleware('can:user.danhsach');
		
		Route::get('sua/{id}','UserController@getSua' )
		->middleware('can:user.sua');
		
		Route::post('sua/{id}','UserController@postSua')
		->middleware('can:user.sua');
		
		Route::get('xoa/{id}','UserController@getXoa' )
		->middleware('can:user.xoa');
		Route::get('them','UserController@getThem' )
		->middleware('can:user.them');
		
		Route::post('them','UserController@postThem' )
		->middleware('can:user.them');
		
		});
///////////////////////////////////////////////	
	 Route::group(['prefix'=>'role'], function(){

	    Route::get('danhsach','RoleController@getDanhSach' )
	    ->middleware('can:role.danhsach');
		
		Route::get('sua/{id}','RoleController@getSua' )
		->middleware('can:role.sua');
		
		Route::post('sua/{id}','RoleController@postSua' )
		->middleware('can:role.sua');
		
		Route::get('xoa/{id}','RoleController@getXoa' )
		->middleware('can:role.xoa');
		
		Route::get('them','RoleController@getThem' )
		->middleware('can:role.them');
		
      Route::post('them','RoleController@postThem' )
      ->middleware('can:role.them');
		
	});

	Route::group(['prefix'=>'permission'], function(){
	
Route::get('them','PermissionController@getpermissionThem') 
->middleware('can:permission.them');
Route::post('them','PermissionController@postpermissionThem')
->middleware('can:permission.them');
	});
	Route::group(['prefix'=>'chucvu'], function(){

	    Route::get('danhsach','ChucvuController@getDanhSach' )
	    ->middleware('can:chucvu.danhsach');
		
		Route::get('sua/{id}','ChucvuController@getSua' )
		->middleware('can:chucvu.sua');
		Route::post('sua/{id}','ChucvuController@postSua' )
		->middleware('can:chucvu.sua');
		
		Route::get('xoa/{id}','ChucvuController@getXoa' )
		->middleware('can:chucvu.xoa');
		
		Route::get('them','ChucvuController@getThem' )
		->middleware('can:chucvu.them');
		
		Route::post('them','ChucvuController@postThem' )
		->middleware('can:chucvu.them');
	}); ////////////////////////

		Route::group(['prefix'=>'congtrinh'], function(){

	 Route::get('danhsach','CongtrinhController@getDanhSach' )
	    ->middleware('can:congtrinh.danhsach');
		
		Route::get('sua/{id}','CongtrinhController@getSua' )
		->middleware('can:congtrinh.sua');
		Route::post('sua1/{id}','CongtrinhController@postSua')
		->middleware('can:congtrinh.sua');
		
		
		Route::get('xoa/{id}','CongtrinhController@getXoa' )
		->middleware('can:congtrinh.xoa');
		
		Route::get('them','CongtrinhController@getThem' )
		->middleware('can:congtrinh.them');
		
		Route::post('them','CongtrinhController@postThem' )
		->middleware('can:congtrinh.them');
	});

		Route::group(['prefix'=>'thucongtrinh'], function(){
      Route::get('timkiem','ThuCongtrinhController@getTimkiem' );
	 Route::get('danhsach','ThuCongtrinhController@getDanhSach' )
	 ->middleware('can:thucongtrinh.danhsach');
		
		Route::get('sua/{id}','ThuCongtrinhController@getSua' )
		->middleware('can:thucongtrinh.sua');
		Route::post('sua/{id}','ThuCongtrinhController@postSua')
		->middleware('can:thucongtrinh.sua');
		
		
		Route::get('xoa/{id}','ThuCongtrinhController@getXoa' )
		->middleware('can:thucongtrinh.xoa');
		
		Route::get('them','ThuCongtrinhController@getThem' )
		->middleware('can:thucongtrinh.them');
		
		Route::post('them','ThuCongtrinhController@postThem' )
		->middleware('can:thucongtrinh.them');
	});
		////////////////////////////////
		Route::group(['prefix'=>'chicongtrinh'], function(){
       Route::get('timkiem','ChiCongtrinhController@getTimkiem' );
	 Route::get('danhsach','ChiCongtrinhController@getDanhSach' )
	 ->middleware('can:chicongtrinh.danhsach');
		
		Route::get('sua/{id}','ChiCongtrinhController@getSua' )
		->middleware('can:chicongtrinh.sua,id');
		Route::post('sua/{id}','ChiCongtrinhController@postSua')
		->middleware('can:chicongtrinh.sua,id');
		
		
		Route::get('xoa/{id}','ChiCongtrinhController@getXoa' )
		->middleware('can:chicongtrinh.xoa,id');
		
		Route::get('them','ChiCongtrinhController@getThem' )
		->middleware('can:chicongtrinh.them');
		
		Route::post('them','ChiCongtrinhController@postThem' )
		->middleware('can:chicongtrinh.them');
	});

		////////////////////////////////
		Route::group(['prefix'=>'dungcu'], function(){
      Route::get('timkiem','DungcuController@getTimkiem' );
	 Route::get('danhsach','DungcuController@getDanhSach' )
	 ->middleware('can:dungcu.danhsach');
		 Route::get('danhsachchitiet','DungcuController@getDanhSachChitiet' )
	 ->middleware('can:dungcu.danhsachchitiet');
		Route::get('sua/{id}','DungcuController@getSua' )
		->middleware('can:dungcu.sua,id');
		Route::post('sua/{id}','DungcuController@postSua')
       ->middleware('can:dungcu.sua,id');
		Route::get('xoa/{id}','DungcuController@getXoa' )
		->middleware('can:dungcu.xoa,id');
		
		Route::get('them','DungcuController@getThem' )
		->middleware('can:dungcu.them');
		
		Route::post('them','DungcuController@postThem' )
		->middleware('can:dungcu.them');
	});
	////////////////////////////////
		Route::group(['prefix'=>'danhsachdungcu'], function(){
      Route::get('timkiem','DanhsachDungcuController@getTimkiem');
	 Route::get('danhsach','DanhsachDungcuController@getDanhSach')
	 ->middleware('can:danhsachdungcu.danhsach');
		
		Route::get('sua/{id}','DanhsachDungcuController@getSua' )
		->middleware('can:danhsachdungcu.sua,id');
		Route::post('sua/{id}','DanhsachDungcuController@postSua')
		->middleware('can:danhsachdungcu.sua,id');
		Route::get('xoa/{id}','DanhsachDungcuController@getXoa' )
		->middleware('can:danhsachdungcu.xoa,id');
		
		Route::get('them','DanhsachDungcuController@getThem' )
		->middleware('can:danhsachdungcu.them');
		
		Route::post('them','DanhsachDungcuController@postThem' )
		->middleware('can:danhsachdungcu.them');
	});	
		////////////////////////////////
		Route::group(['prefix'=>'chitietdanhsachdungcu'], function(){
    Route::get('timkiem','ChitietDanhsachDungcuController@getTimkiem');
	 Route::get('danhsach','ChitietDanhsachDungcuController@getDanhSach')
	 ->middleware('can:chitietdanhsachdungcu.danhsach');
		
		
		Route::get('xoa/{id}','ChitietDanhsachDungcuController@getXoa' )
		->middleware('can:chitietdanhsachdungcu.xoa,id');
		
		
	});	
		////////////////////////////////
		Route::group(['prefix'=>'thuketoan'], function(){
      Route::get('timkiem','ThuketoanController@getTimkiem');
	 Route::get('danhsach','ThuketoanController@getDanhSach')
	 ->middleware('can:thuketoan.danhsach');
		
		Route::get('sua/{id}','ThuketoanController@getSua' )
	 ->middleware('can:thuketoan.sua,id');
		Route::post('sua/{id}','ThuketoanController@postSua')
		->middleware('can:thuketoan.sua,id');
		Route::get('xoa/{id}','ThuketoanController@getXoa' )
		->middleware('can:thuketoan.xoa,id');
		
		Route::get('them','ThuketoanController@getThem' )
		->middleware('can:thuketoan.them');
		
		Route::post('them','ThuketoanController@postThem' )
		->middleware('can:thuketoan.them');
      });	

      ////////////////////////////////
		Route::group(['prefix'=>'chiketoan'], function(){
       Route::get('timkiem','ChiketoanController@getTimkiem');
	 Route::get('danhsach','ChiketoanController@getDanhSach')
	 ->middleware('can:chiketoan.danhsach');
		
		Route::get('sua/{id}','ChiketoanController@getSua' )
		->middleware('can:chiketoan.sua,id');
		Route::post('sua/{id}','ChiketoanController@postSua')
		->middleware('can:chiketoan.sua,id');
		Route::get('xoa/{id}','ChiketoanController@getXoa' )
		->middleware('can:chiketoan.xoa,id');
		
		Route::get('them','ChiketoanController@getThem' )
		->middleware('can:chiketoan.them');
		
		Route::post('them','ChiketoanController@postThem' )
		->middleware('can:chiketoan.them');
      });	
     
       ////////////////////////////////
		Route::group(['prefix'=>'tonghopthuketoan'], function(){
     Route::get('timkiem','TonghopController@getTimkiemThuketoan');
  Route::get('danhsach','TonghopController@getDanhSachThuketoan')
	 ->middleware('can:tonghopthuketoan.danhsach'); });	
		 ////////////////////////////////
		Route::group(['prefix'=>'tonghopchiketoan'], function(){
     Route::get('timkiem','TonghopController@getTimkiemChiketoan');
  Route::get('danhsach','TonghopController@getDanhSachChiketoan')
	 ->middleware('can:tonghopchiketoan.danhsach');
		
      });	
       ////////////////////////////////
		Route::group(['prefix'=>'tonghopthucongtrinh'], function(){
     Route::get('timkiem','TonghopController@getTimkiemThucongtrinh');
  Route::get('danhsach','TonghopController@getDanhSachThucongtrinh')
	 ->middleware('can:tonghopthucongtrinh.danhsach'); });	
		 ////////////////////////////////
		Route::group(['prefix'=>'tonghopchicongtrinh'], function(){
     Route::get('timkiem','TonghopController@getTimkiemChicongtrinh');
  Route::get('danhsach','TonghopController@getDanhSachChicongtrinh')
	 ->middleware('can:tonghopchicongtrinh.danhsach');
		
      });
       ////////////////////////////////
		Route::group(['prefix'=>'tonghopdungcu'], function(){
     Route::get('timkiem','TonghopController@getTimkiemDungcu');
  Route::get('danhsach','TonghopController@getDanhSachDungcu')
	 ->middleware('can:tonghopdungcu.danhsach');
		
      });
      //////////////////////////////	
       Route::get('guiemail','GuiemailController@getGuiemail');
        Route::post('guiemail','GuiemailController@postGuiemail');
        Route::get('guinhieu_email','GuiemailController@getGuinhieu_email') ->middleware('can:guinhieu_email.danhsach');
       Route::post('guinhieu_email','GuiemailController@postGuinhieu_email')->middleware('can:guinhieu_email.danhsach');
        
         	
        


 });		
	
//////////////////// page
Route::get('/dangky','PageController@Trangchu');
Route::get('/','PageController@Trangchu');
Route::get('/trangchu','PageController@Trangchu');
Route::get('/lien-he.html','PageController@Lienhe');
Route::get('/du-an.html','PageController@Du_an');
Route::get('/gioi-thieu','PageController@Gioithieu');
Route::get('dich-vu','PageController@Dichvu');
Route::get('tuyen-dung','PageController@Tuyendung');
Route::get('lien-he','PageController@Lienhe');
Route::post('lien-he','PageController@postLienhe');
Route::get('test','PageController@Test');
Route::get('tin-tuc-1','PageController@Tintuc1');
Route::get('tin-tuc-2','PageController@Tintuc2');
Route::get('tin-tuc-3','PageController@Tintuc3');
Route::get('tin-tuc-4','PageController@Tintuc4');
Route::get('chitiet_duan/{id}.html','PageController@Chitiet_duan');
Route::get('{TieuDeKhongDau}.{id}.html','PageController@Duan');

Route::get('/loaitin/{TieuDeKhongDau}.{id}.html','PageController@LoaiTin');
Route::get('/tintuc/{TieuDeKhongDau}.{id}.html','PageController@TinTuc');
Route::get('/dangxuat','PageController@dangxuat');
Route::post('/binhluan/{id}','PageController@postBinhLuan');

////////////////////////////////
Route::get('/dangky','UserController@getDangkyNguoidung');
Route::post('/dangky','UserController@postDangkyNguoidung');
Route::get('dangnhap','UserController@getDangnhapPage' );
Route::post('dangnhap','UserController@postDangnhapPage' );
Route::get('dangxuat','UserController@getDangXuatPage' );

Route::get('nguoidung/{id}','UserController@getNguoidungPage' );
Route::post('suanguoidung/{id}','UserController@postNguoidungPage' );
Route::get('timkiem','PageController@getTimKiemPage' );
Route::post('binhluan/{id}.html','PageController@postBinhLuanPage' );
Route::get('theloai/{TenKhongDau}.{id}.html','PageController@theLoai' );
//////////////////////////////////////////////////////
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');


