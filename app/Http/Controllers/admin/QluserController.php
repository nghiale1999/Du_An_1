<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class QluserController extends Controller
{
    public function Qluser(){
        $user = User::all();
        return view('admin.qluser',compact('user'));
    }

    public function DeleteUser($id){
        if(User::where('id',$id)->delete()){
            return redirect()->back()->with('success','xoa user thanh cong');
        }else{
            return redirect()->back()->withErrors('xoa that bai');
        }
    }

    public function warning($id){
        $user = User::where('id',$id)->get();
        return view('admin.warning',compact('user'));
    }
   
   
    public function PostWarning(Request $request){
        $tieude = $request->tieude;
        $noidung = $request->noidung;
        $ten = $request->name;
        $email = $request->email;
        $data = [
            'tieude'=>$tieude,
            'noidung'=>$noidung,   
            'email'=>$email,   
            'ten'=>$ten,   
        ];
        Mail::send('admin.mail',$data,function($mail) use($request){
            $mail_from = Auth::user()->email;
            $mail_name = Auth::user()->name;
            $mail->from($mail_from,$mail_name);
            $mail->to($request->email,$request->name);
            $mail->subject($request->tieude);
        });
        return redirect()->back()->with('success','gui yeu cau thang cong');
        
    }
}
