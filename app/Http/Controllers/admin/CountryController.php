<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\ModelCountry;
class CountryController extends Controller
{
    public function GetCountry(){

        $data = ModelCountry::all();
        return view('admin.Country',compact('data'));
    }

    public function GetAdd(){
        return view('admin.addCountry');
    }
 
    public function PostAdd(Request $request){
 
         $data = new ModelCountry;
         $data->name = $request->name;
         $data->save();
         if($data->save()){
             return redirect()->back()->with('success','them country thang cong');
         }else{
             return redirect()->back()->withErrors('them country that bai');
         }
    }

    public function GetDelete($id){

        ModelCountry::where('id',$id)->delete();
        return view('admin.deleteCountry');
    }

    
}
