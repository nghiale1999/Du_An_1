<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelProduct;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function GetCart(){

        $data = [];
        $id = Auth::user()->id;
        if(session()->has('cart')) {
            $SS = session()->get('cart');
            foreach($SS as  $value){
                if($value['id_user'] == $id){
                    $data[] = ModelProduct::find($value['id_product'])->toArray();
                }
            }
            return view('frontend.cart',compact('data','SS'));
        }else{
            return view('frontend.cart');
        }
        
    }

    public function AddCart(Request $request){

        // session()->flush();
        // echo 'ban da xoa ss';

        
        $id_product = $request->id_product;
        $data['id_product'] = $id_product;
        $data['id_user'] = Auth::user()->id;
        $data['soluong'] = 1;
        $check = 0;
        
        if(session()->has('cart')) {
            $SS = session()->get('cart');
            foreach($SS as $key => $value){
                if($value['id_product'] == $id_product){
                    $SS[$key]['soluong'] += 1;
                    session()->put('cart',$SS);
                    $check = 1;
                }
            }
        }
        if($check == 0){
            session()->push('cart',$data);
        }        
        echo 'ban da mua thanh cong';
    }


    public function DeleteCart(Request $request){
        
        $id_product = $request->id_product;
        $id = Auth::user()->id;
        if(session()->has('cart')){
            $ss = session()->get('cart');
            foreach ($ss as $key=>$value) {
                if($value['id_product'] == $id_product && $value['id_user'] == $id){
                    unset($ss[$key]);
                    echo 'xoa thanh cong';
                }
            }
            session()->put('cart',$ss);
           
        }else{
            echo 'xoa that bai';
        }

    }

    public function DownCart(Request $request){
       
        $id_product = $request->id_product;
        $id = Auth::user()->id;
        if(session()->has('cart')){
            $SS = session()->get('cart');
            foreach($SS as $key => $value){
                if($value['id_product'] == $id_product && $value['id_user'] == $id){
                    $SS[$key]['soluong'] = $SS[$key]['soluong'] - 1;
                    
                    if($SS[$key]['soluong'] == 0){
                        unset($SS[$key]);
                    }
                    echo 'giam sp thanh cong';
                }            
            }
            session()->put('cart', $SS);
        }else{
            echo 'giam sp that bai';

        }
    }
    public function UpCart(Request $request){
       
        $id_product = $request->id_product;
        $id = Auth::user()->id;
        if(session()->has('cart')){
            $SS = session()->get('cart');
            foreach($SS as $key => $value){
                if($value['id_product'] == $id_product && $value['id_user'] == $id){
                    $SS[$key]['soluong'] = $SS[$key]['soluong'] + 1;
                    echo 'them sp thanh cong';
                }            
            }
            session()->put('cart', $SS);
        }else{
            echo 'them sp that bai';

        }
    }






}
