<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelProduct;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Image;



class ProductController extends Controller
{
    public function GetProduct(){
        $id_user = Auth::user()->id;
        $data = ModelProduct::where('id_user',$id_user)->get();
        return view('frontend.product',compact('data'));
    }


    public function GetAddProduct(){
       
        return view('frontend.addproduct');
    }


    public function PostAddProduct(ProductRequest $request){
       
        $id_user = Auth::user()->id;
        $giamgia = $request->giamgia;
        if($giamgia == 1){
            $sale = $request->sale;
        }else{
            $sale = 0;
        }

        $img = array();
        $ngay = strtotime(date('Y-m-d H:i:s'));
        if ($file = $request->file('img')) {
            foreach ($file as  $value) {
                $name = $ngay.$value->getClientOriginalName();
                $img[] = $name;
            }
        }
         
       
        if(count($img) > 3){
            return redirect()->back()->withErrors("ban da nhap qua 3 hinh");
        }
        $hinh = json_encode($img);


        $data = new ModelProduct;
        $data->tensp = $request->tensp;
        $data->giasp = $request->giasp;
        $data->loaisp = $request->loaisp;
        $data->thuonghieu = $request->thuonghieu;
        $data->mota = $request->mota;
        $data->id_user = $id_user;
        $data->giamgia = $giamgia;
        $data->hinh = $hinh;
        $data->sale = $sale;
        if($data->save()){
            
            foreach($file as $image)
            {
                $name = 'nho-'.$ngay.$image->getClientOriginalName();
                $name_2 = 'vua-'.$ngay.$image->getClientOriginalName();
                $name_3 = 'to-'.$ngay.$image->getClientOriginalName();

                $path = public_path('upload/user/product/'.$id_user.$name);
                $path2 = public_path('upload/user/product/'.$id_user.$name_2);
                $path3 = public_path('upload/user/product/'.$id_user.$name_3);


                

                Image::make($image->getRealPath())->resize(50, 70)->save($path);
                Image::make($image->getRealPath())->resize(70,100)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);
           
            }
            return redirect()->back()->with('success','Tao moi thanh cong');      
        }else{
            return redirect()->back()->withErrors('Tao moi that bai');
        }


        
    }


    public function DeleteProduct($id){
        ModelProduct::where('id',$id)->delete();
        return redirect()->back()->with('success','xóa sản phẩm thanh cong');
    }



    public function GetEditProduct($id){
        $data = ModelProduct::where('id',$id)->get();
        return view('frontend.EditProduct',compact('data'));
    }
    

    public function EditProduct(ProductRequest $request,$id){

        $product = ModelProduct::findOrFail($id);
        $data = $request->all();
        $id_user = Auth::user()->id;
        $giamgia = $request->giamgia;
        if($giamgia == 1){
            $sale = $request->sale;
        }else{
            $sale = 0;
        }

        $img = array();
        if(!empty($data['file'])){
            //lay hing trong data chuyen thangf mang
            $mangcu= json_decode($product['hinh'], true);
            // chayj mangr va so sang neu trung thi xoa
            foreach($mangcu as $key => $value){                 

                if(in_array($value, $data['file'] )){
                //xoa phan tu thu key
                    unset($mangcu[$key]);                    
                }else{
                    $img[] = $value; 
                }
            }
        }

        $ngay = strtotime(date('Y-m-d H:i:s'));
        if ($file = $request->file('img')) {
            foreach ($file as  $value) {
                $name = $ngay.$value->getClientOriginalName();
                $img[] = $name;
            }
        }
         
       
        if(count($img) > 3){
            return redirect()->back()->withErrors("ban da nhap qua 3 hinh");
        }
        $hinh = json_encode($img);

        $data['id_user'] = $id_user;
        $data['giamgia'] = $giamgia;
        $data['hinh'] = $hinh;
        $data['sale'] = $sale;
        
        if ($product->update($data)) {
            foreach($file as $image)
            {
                $name = 'nho-'.$ngay.$image->getClientOriginalName();
                $name_2 = 'vua-'.$ngay.$image->getClientOriginalName();
                $name_3 = 'to-'.$ngay.$image->getClientOriginalName();

                $path = public_path('upload/user/product/'.$id_user.$name);
                $path2 = public_path('upload/user/product/'.$id_user.$name_2);
                $path3 = public_path('upload/user/product/'.$id_user.$name_3);


                

                Image::make($image->getRealPath())->resize(50, 70)->save($path);
                Image::make($image->getRealPath())->resize(70,100)->save($path2);
                Image::make($image->getRealPath())->resize(200, 300)->save($path3);
           
            }
            return redirect()->back()->with('success','update thanh cong');      
        }else{
            return redirect()->back()->withErrors('update that bai');
        }

    }

}
