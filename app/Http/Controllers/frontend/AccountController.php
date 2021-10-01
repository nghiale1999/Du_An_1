<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\ModelCountry;
use App\Http\Requests\UpdateAdmin;


class AccountController extends Controller
{
    public function GetAccount(){
        $datacountry = ModelCountry::all();
        
        return view('frontend.account',compact('datacountry'));
    }

    public function PostAccount(UpdateAdmin $request){


        $data = $request->all();
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $file = $request->file('avatar');
        $data['avatar']=$file->getClientOriginalName();
        if($data['password'] == ''){
            $data['password'] = bcrypt(Auth::user()->password);
        }
       
        $data['address'] = $request->address;

        if($user->update($data)){
            $file->move('upload', $file->getClientOriginalName());
            return redirect()->back()->with('success','update thang cong');
        }else{
            return redirect()->back()->withErrors('update that bai');
        }
    }
}
