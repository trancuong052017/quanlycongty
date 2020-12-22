<?php
return [
'access'=> [ //QUYỀN TRUY CÂP Đưa vào pROVIDERS  -> AUTHENSERVIEPROVIDER 
'list_category_parent' => 'theloai.danhsach', //theloai/dánhach là ten  dinh nghĩa o router cho phép truy cập 
'add_category_parent' => 'theloai.them',
'edit_category_parent' => 'theloai.sua',
'delete_category_parent' => 'theloai.xoa',

'list_category' => 'loaitin.danhsach',
'add_category' => 'loaitin.them',
'edit_category' => 'loaitin.sua',
'delete_category' => 'loaitin.xoa',

'list_post' => 'tintuc.danhsach',
'add_post' => 'tintuc.them',
'edit_post' => 'tintuc.sua',
'delete_post' => 'tintuc.xoa',

'list_comment' => 'comment.danhsach',
'delete_comment' => 'comment.xoa',

'list_role' => 'role.danhsach',
'add_role' => 'role.them',
'edit_role' => 'role.sua',
'delete_role' => 'role.xoa',

'list_slide' => 'slide.danhsach',
'add_slide' => 'slide.them',
'edit_slide' => 'slide.sua',
'delete_slide' => 'slide.xoa',

'list_user' => 'user.danhsach',
'add_user' => 'user.them',
'edit_user' => 'user.sua',
'delete_user' => 'user.xoa',
'delete_permission'=>'permission.xoa',
'add_permission'=>'permission.them',
'edit_permission'=>'permission.danhsach',

'list_chucvu' => 'chucvu.danhsach',
'add_chucvu' => 'chucvu.them',
'edit_chucvu' => 'chucvu.sua',
'delete_chucvu' => 'chucvu.xoa',

'list_congtrinh' => 'congtrinh.danhsach',
'add_congtrinh' => 'congtrinh.them',
'edit_congtrinh' => 'congtrinh.sua',
'delete_congtrinh' => 'congtrinh.xoa',

'list_thucongtrinh' => 'thucongtrinh.danhsach',
'add_thucongtrinh' => 'thucongtrinh.them',
'edit_thucongtrinh' => 'thucongtrinh.sua',
'delete_thucongtrinh' => 'thucongtrinh.xoa',

'list_chicongtrinh' => 'chicongtrinh.danhsach',
'add_chicongtrinh' => 'chicongtrinh.them',
'edit_chicongtrinh' => 'chicongtrinh.sua',
'delete_chicongtrinh' => 'chicongtrinh.xoa',

'list_chitiet _dungcu' => 'dungcu.danhsachchitiet',
'list_dungcu' => 'dungcu.danhsach',
'add_dungcu' => 'dungcu.them',
'edit_dungcu' => 'dungcu.sua',
'delete_dungcu' => 'dungcu.xoa',

'list_danhsachdungcu' => 'danhsachdungcu.danhsach',
'add_danhsachdungcu' => 'danhsachdungcu.them',
'edit_danhsachdungcu' => 'danhsachdungcu.sua',
'delete_danhsachdungcu' => 'danhsachdungcu.xoa',

'list_chitietdanhsachdungcu' => 'chitietdanhsachdungcu.danhsach',

'delete_chitietdanhsachdungcu' => 'chitietdanhsachdungcu.xoa',

'list_chiketoan' => 'chiketoan.danhsach',
'add_chiketoan' => 'chiketoan.them',
'edit_chiketoan' => 'chiketoan.sua',
'delete_chiketoan' => 'chiketoan.xoa',


'list_thuketoan' => 'thuketoan.danhsach',
'add_thuketoan' => 'thuketoan.them',
'edit_thuketoan' => 'thuketoan.sua',
'delete_thuketoan' => 'thuketoan.xoa',

'list_tonghopthuketoan' => 'tonghopthuketoan.danhsach',
'list_tonghopchiketoan' => 'tonghopchiketoan.danhsach',
'list_tonghopthucongtrinh' => 'tonghopthucongtrinh.danhsach',
'list_tonghopchicongtrinh' => 'tonghopchicongtrinh.danhsach',
'list_tonghopdungcu' => 'tonghopdungcu.danhsach',
'list_guinhieu_email' => 'guinhieu_email.danhsach',


'list_duan' => 'duan.danhsach',
'add_duan' => 'duan.them',
'edit_duan' => 'duan.sua',
'delete_duan' => 'duan.xoa',


],
 'table_module'=> [
 	'theloai',
 	'loaitin',
 	'tintuc',
 	'binhluan',
 	'role',
 	'slide',
 	'user',
 	'permission',
 	'chucvu' ,
 	'congtrinh',
 	'thucongtrinh',
 	'chicongtrinh',
 	 'dungcu',
 	 'danhsachdungcu',
 	 'chitietdanhsachdungcu',
 	 'thuketoan',
 	 'chiketoan',
 	 'tonghopthuketoan',
 	 'tonghopchiketoan',
 	 'tonghopthucongtrinh',
 	'tonghopchicongtrinh',
 	 'tonghopdungcu',
 	 'guinhieu_email',
 	 'duan',
 ],
 'table_permission_child'=> [
 	'danhsach',
 	'them',
 	'sua',
 	'xoa'
 	
 ],
];