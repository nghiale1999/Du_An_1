<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelBlog;
use App\Http\Requests\RequestBlog;
use App\Http\Requests\UpdateAdmin;

class BlogController extends Controller
{
    public function GetBolg(){
        $data = ModelBlog::paginate(3);
        return view('admin.blog',compact('data'));
    }

    public function GetAdd(){
        return view('admin.addBlog');
    }

    public function PostAdd(RequestBlog $request){
           
        $file = $request->file('file');  
        $hinh = $file->getClientOriginalName();
        $data = new ModelBlog;
        $data->tieude = $request->tieude;
        $data->hinh = $hinh;
        $data->noidung = $request->noidung;
        $data->des = $request->des;
        $data->save();
        if($data->save()){
            $file->move('upload', $file->getClientOriginalName());
            return redirect()->back()->with('success','them blog thang cong');
        }else{
            return redirect()->back()->withErrors('them that bai');
        }
        
    }


    public function GetEdit($id){

        $data = ModelBlog::where('id',$id)->get();
        
        return view('admin.editBlog',compact('data'));
    }

    public function PostEdit(RequestBlog $request, $id){
       
       
        $blog = ModelBlog::findOrFail($id);

        $file = $request->file('file');
        
        $data = $request->all();
        $data['hinh']=$file->getClientOriginalName();
        $blog->update($data); 
        if($blog->update($data)){
            $file->move('upload', $file->getClientOriginalName());
            return redirect()->back()->with('success','update thanh coong');
        }else{
            return redirect()->back()->withErrors('update that bai');
        }
        
    }


    public function GetDelete($id){
        ModelBlog::where('id',$id)->delete();
        return view('admin.deleteBlog');
    }
}
