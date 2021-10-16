<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelBlog;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use App\Http\Requests\CmtRequest;
use App\ModelComment;
use Illuminate\Support\Facades\Auth;
use App\ModelRate;

class FeBlogController extends Controller
{

    //lay table blog show ra trang blog va phan trang
    public function GetBlog(){

        $data = ModelBlog::paginate(3);

        return view('frontend.blog',compact('data'));
    }

    //lay blog bawng id vaf show ra blogsingle
    //lay du lieu pre va next ra trang blogsingle
    public function GetBlogSingle($id){
        //lay du lieu blog
        $data = ModelBlog::where('id',$id)->get();
        $datapre = ModelBlog::where('id','<',$id)->max('id');
        $datanext = ModelBlog::where('id','>',$id)->min('id');
        
        //lay du lieu comment
        $comment = ModelComment::all();

        //lay du lieu rate
        //xu ly tinh trung binh so sao 
        $rate = ModelRate::where('id_blog',$id)->get();
        $tbs = 0;
        if(!empty($rate)){
            $dem = 0.01;
            $tong = 0;
            foreach ($rate as $value) {
                $tong += $value->sosao;
                $dem++;
            }
            $tbs = round($tong/$dem);
        }

        return view('frontend.blogsingle',compact('data','datapre','datanext','comment','tbs'));
    }

    // luu comment vao data
    public function SaveComment(CmtRequest $request,$id){
        
        $data = new ModelComment;
        $data->id_blog = $id;
        $data->id_user = Auth::user()->id;
        $data->name = Auth::user()->name;
        $data->avatar = Auth::user()->avatar;
        $data->cmt = $request->message;
        $data->id_cmt = 0;
        if($request->id_cmt != ''){
            $data->id_cmt = $request->id_cmt;
        }
        $data->save();

        if($data->save()){

            return redirect()->back();

        }

    }
   
    //lấy và lưu đánh giá sao từ ajax
    public function rate(Request $request){
       
        $id_blog = $request->blog;
        $id_user = Auth::user()->id;

        $rate = ModelRate::all();

        foreach ($rate as  $value) {
            if($value->id_blog == $id_blog && $value->id_user == $id_user){
                return 'ban danh gia bai viet';
            }else{
                $data = new ModelRate;
                $data->id_blog = $request->blog;
                $data->id_user = Auth::user()->id;
                $data->sosao = $request->rate;
                $data->save();
            }
        }
 
        if($data->save()){
            return 'danh gia thanh cong';
        }else{
            return 'danh gia that bai';
        }
     }



}
