<?php





namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function Getmail(){
        return view('frontend.Support');
    }


    public function seedmail(Request $request){
        $mail_from = Auth::user()->email;
        $mail_name = Auth::user()->name;
        $tieude = $request->tieude;
        $noidung = $request->noidung;
        $data = [
            'tieude'=>$tieude,
            'noidung'=>$noidung,
            'ten'=>$mail_name,
            'mail'=>$mail_from,
        ];
        Mail::send('frontend.mail',$data,function($mail) use($request){
            $mail_from = Auth::user()->email;
            $mail_name = Auth::user()->name;
            $mail->from($mail_from,$mail_name);
            $mail->to('lenghiamailtest@gmail.com','nghiale');
            $mail->subject($request->tieude);
        });
        return redirect()->back()->with('success','gui yeu cau thang cong');
        
         
        
        
    }
}
