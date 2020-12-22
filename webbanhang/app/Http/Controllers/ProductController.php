<?php
namespace App\Http\Controllers;
use App\products;
use Illuminate\Http\Request;
use File;
use App\customer;
use App\bills;
use App\type_products;
use App\bill_detail;
class ProductController extends Controller
{
  public function getDanhsach(){
  	$danhsach_sp =products::all();
  	return view('admin.product.danhsach',compact('danhsach_sp'));
  }
 public function getThem(){
 	$type_product=type_products::all();
  	$danhsach_sp =products::all();
  	return view('admin.product.them',compact('type_product'));
  }

public function postThem(Request $request){
	//dd($request->all());
 //dd($request->Ten);
     	$this->validate($request ,
     		['name'=>'required',
              'image'=>'required',
              'description'=>'required',
              'unit_price'=>'required',
              'type_product'    =>'required'
     		],
     		['name.required'=>'ban chưa nhập tên ',
     		'image.required'=>'ban chưa chọn ảnh ',
     		'description.required'=>'ban chưa nhập nội dung ',
            'unit_price.required'=>'ban chưa nhập giá ',
            'type_product.required' =>'ban chọn loại sản phẩm '
     		]);
     		 $unit_price =str_replace(',','', $request->unit_price);
         //dd($request->tien);
        if($unit_price<=0){  return redirect('admin/product/them')->with('loi','chưa nhập số tiền,hoặc tiền không đúng đinh dạng ');}
     	$product  = new products;
        $product->unit_price = $unit_price;
        $product->name = $request->name ;
        $product->description = $request->description;
        //$product->image = $image ;
        $product->id_type=$request->type_product;
         
        if($request->hasFile('image')){
            $file=$request->file('image');
         
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/product/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/source/image/product/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/source/image/product",$Hinh);
                $product->image=$Hinh;

            }
        if($request->hasFile('image_list')){
        	
            $files=$request->file('image_list');
           // dd($files);
            $n=0;
             $image_list=array();
         foreach($files as $file ){
         	
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4')
        {
           return redirect('admin/product/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/source/image/product".$Hinh))
               {
                $Hinh =random_int(4,20).'_'.$name;
               }
                $file->move("public/source/image/product",$Hinh);
                
                $image_list[$n]=$Hinh;
                
           $n=$n+1;
            }
          
          }
        
       if($request->promotion_price)
       { $promotion =str_replace(',','', $request->promotion_price);
       	$product->promotion_price=$promotion;
       }
        $product->image_list=json_encode($image_list);
     	$product->save();
     	
    	return redirect('admin/product/danhsach')->with('thongbao','them thanh cong');
  
  }

   public function getSua($id){
 	$type_product=type_products::all();
  	$sanpham  =products::find($id);
  	return view('admin.product.sua',compact('type_product','sanpham'));
  }

  public function postSua(Request $request,$id){
	//dd($request->all());
 //dd($request->Ten);
  	$product  =  products::find($id);
     	$this->validate($request ,
     		['name'=>'required',
              //'image'=>'required',
              'description'=>'required',
              'unit_price'=>'required',
              'type_product'    =>'required'
     		],
     		['name.required'=>'ban chưa nhập tên ',
     		//'image.required'=>'ban chưa chọn ảnh ',
     		'description.required'=>'ban chưa nhập nội dung ',
            'unit_price.required'=>'ban chưa nhập giá ',
            'type_product.required' =>'ban chọn loại sản phẩm '
     		]);
     		 $unit_price =str_replace(',','', $request->unit_price);
         //dd($request->tien);
        if($unit_price<=0){  return redirect('admin/product/them')->with('loi','chưa nhập số tiền,hoặc tiền không đúng đinh dạng ');}
     	$product  =  products::find($id);
        $product->unit_price = $unit_price;
        $product->name = $request->name ;
        $product->description = $request->description;
        //$product->image = $image ;
        $product->id_type=$request->type_product;
         
        if($request->hasFile('image')){
            $file=$request->file('image');
         
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4'){
           return redirect('admin/product/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/source/image/product/".$Hinh)){
                $Hinh =random_int(4,20).'_'.$name;
                }
                $file->move("public/source/image/product",$Hinh);
                 $old_image ='public/source/image/product/'.$product->image;
                 //dd($old_image);
                if(File::exists($old_image))
              {
                  File::delete($old_image);
                  //dd($old_image);
             }
           
                $product->image=$Hinh;

            }
            else{$product->image =$product->image;}
        if($request->hasFile('image_list')){
        	
            $files=$request->file('image_list');
           // dd($files);
            $n=0;
             $image_list=array();
         foreach($files as $file ){
         	
            $duoi=$file->getClientOriginalExtension();
        if($duoi!='jpg'&& $duoi !='png' && $duoi !="jpeg"&& $duoi !='jfif'&& $duoi != 'mp4')
        {
           return redirect('admin/product/them')->with('thongbao','ban chon dang hinh khong dung dinh dang'); 
        }
            $name=$file->getClientOriginalName();
            
            $Hinh=random_int(4,20)."_".$name;//tao chuoi ngau nhien
            while(file_exists("public/source/image/product".$Hinh))
               {
                $Hinh =random_int(4,20).'_'.$name;
               }
                $file->move("public/source/image/product",$Hinh);
                
                $image_list[$n]=$Hinh;
                
           $n=$n+1;
            }
           $product->image_list=json_encode($image_list);
          }
        else {$product->image_list=$product->image_list ;}
       if($request->promotion_price)
       { $promotion =str_replace(',','', $request->promotion_price);
       	$product->promotion_price=$promotion;
       }
        
     	$product->save();
     	
    	return redirect('admin/product/sua/'.$id)->with('thongbao','sua thanh cong');
  
  }

}
