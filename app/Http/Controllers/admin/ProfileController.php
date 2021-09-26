<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAdmin;
use Illuminate\Support\Facades\DB;
use App\ModelCountry;
class ProfileController extends Controller
{
    public function GetProfile(){
        $datacountry = ModelCountry::all();
        $data = Auth::user();
        return view('admin.profile',compact('data','datacountry'));
    }

    public function PostProfile(UpdateAdmin $request){

        $name = $request->name;
        $file = $request->file('avatar');
        $password = bcrypt($request->password);
        $phone = $request->phone;
        $country = $request->country;
        $address = $request->address;
       
        
        
        $avatar = $file->getClientOriginalName();
        $id = Auth::user()->id;

        if($password == ''){
            $password = bcrypt(Auth::user()->password);
        }

        if(DB::table('users')->where('id',$id)->update([
            'name'=>$name,
            'address'=>$address,
            'password'=>$password,
            'phone'=>$phone,
            'avatar'=>$avatar,
            'country'=>$country,
            'id_country'=>$country
        ])){
            $file->move('admin/assets/images/users', $file->getClientOriginalName());
            return redirect()->back()->with('success','update thang cong');
        }else{
            return redirect()->back()->withErrors('update that bai');
        
        }


        
         
        

    }
}
