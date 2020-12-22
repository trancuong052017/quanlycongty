<?php

namespace App\Http\Controllers;
use App\products;
use Illuminate\Http\Request;
use Cart;
use App\customer;
use App\bills;
use App\bill_detail;
class Cartcontroller extends Controller
{
    public function  Save_cart(Request $request){
    	//dd($request->all());
    	$product_id=$request->id;
    	$qty=$request->qty;
    	$product=products::find($product_id);
    	//dd($product);
    	$data['id']=$product->id;
    	$data['qty']=$qty;

    	$data['name']=$product->name;
    	$data['price']=$request->price;
    	$data['weight']=12;
    	$data['options']['image']=$product->image;
    	//dd($data['option']['image']);
    	Cart::add($data);
    	//Cart::destroy();
        //dd($cart);
        $cart=Cart::content();
        //dd($cart);
    	return redirect('show_cart');

    }
     public function show_cart(){
      $cart=Cart::content();
      return view('page.giohang',compact('cart'));
    }
    public function delete_cart($rowId){
      Cart::update($rowId,0);
      return redirect('/show_cart');
    }
     public function update_cart(Request $request){
     	//dd($request->all());
     	$rowId =$request->rowid;
     	$qty=$request->qty;
      Cart::update($rowId,$qty);
      return redirect('/show_cart');
    }
     public function getdathang(){
     	 $cart=Cart::content();
     	return view('page.dathang',compact('cart'));
     }
     ///////////////////////////////////////
     public function postdathang(Request $request){
     	  //thong gio hang
       $cart=Cart::content();
		
		//pre($carts);
        $this->validate($request,[
			    'email'=>'required',
			     'hoten'=>'required',
			     'diachi'=>'required',
			     'dienthoai'=>'required'
			  ],
			  ['email.required'=>'bạn chưa nhập email',
			    
			  'hoten.required'=>'bạn chưa nhập passvord',
			  'diachi.required'=>'bạn chưa nhập địa chỉ ',
			  'dienthoai.required'=> 'bạn chưa nhập điện thoại'
			  ]);
        $new_customer =customer::where('email',$request->email)->first();
        if($new_customer==null){
              $customer= new customer ;
               $customer->email=$request->email;
		       $customer->name =$request->hoten;
		       $customer->address=$request->diachi;
		       $customer->phone=$request->dienthoai;
		       /*if(isset($request->ghichu)){
		       $customer->note=$request->ghichu ;
		        }
		       else{$customer->note='';} */
		       $customer->save();
           $id_customer=$customer->id;
           }
           else{$id_customer=$new_customer->id;}
		       $id_customer=$id_customer;

		       $bill= new bills;
               $bill->id_customer =$id_customer;
               if(isset($request->vanchuyen)){
               $bill->total=str_replace(',','','.',Cart::subtotal())+str_replace(',','',$request->vanchuyen);}
               else{$bill->total=Cart::subtotal();
                $bill->total=str_replace(',','',$bill->total);}
               $bill->date_order=now();
              $bill->payment=$request->hinhthuc;
              $bill->status=0;
              $bill->note=$request->ghichu;
              $bill->save();
              $id_bill=$bill->id;
              //them vao bảng order (chi tiết đơn hàng)
               
                foreach ($cart as $cart)
                {    $bill_detail =new bill_detail;
                	$bill_detail->id_bill=$id_bill;
                	$bill_detail->id_product=$cart->id;
                	$bill_detail->quantity=$cart->qty;
                	$bill_detail->unit_price=$cart->qty*$cart->price;
                   $bill_detail->save() ;
                }
				
                //xóa toàn bô giỏ hang
               Cart::destroy();
				
              /*"<script>
              alert('dat hang thanh cong');
               </script>"*/
               return  redirect('index')->with('thongbao','Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra và gửi hàng cho bạn');
            
			 
        
        
        
       
     }
}
