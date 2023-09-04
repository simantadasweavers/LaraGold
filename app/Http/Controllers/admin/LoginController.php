<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Adminlogs;

class LoginController extends Controller
{
    function login(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        $email = $request['email'];
        $pass = $request['passwd'];

        $log = new Adminlogs;
        $log->logemail = $email;
        $log->logpassword = $pass;
        $log->adate = date("Y/m/d");
        date_default_timezone_set("Asia/Kolkata");
        $log->atime = date("h:i:sa");
        $log->aloc = $_SERVER['REMOTE_ADDR'];
        $log->save();

        $host = env('DB_HOST');
        $user = env('DB_USERNAME');
        $userPass = env('DB_PASSWORD');
        $db = env('DB_DATABASE');

        $conn = mysqli_connect($host,$user,$userPass,$db);

        // filtering user inputs
        $email = htmlspecialchars($email);
        $pass = htmlspecialchars($pass);
        $email = mysqli_real_escape_string($conn,$email);
        $pass = mysqli_real_escape_string($conn,$pass);

        $num = DB::table('admins')->where('email', '=',$email)
        ->where('passwd', '=',$pass)->get()->count();

        if($num == 1){
            // valid admin
            session(['adminMail' => $email]);

            return redirect('/admin_dashboard');
        }
        else{
            return view('admin/login');
        }
    }

    function dashboard(Request $request){
        if(session()->get('adminMail')){
            $mail = session()->get('adminMail');
            $admin = DB::table('admins')->where('email','=',$mail)->get();
            return view('/admin/dashboard');
            }
        else{
             return view('/admin/login');
        }
    }

    function logs(Request $request){
      if(session()->get('adminMail')){
            $mail = session()->get('adminMail');
            $log = DB::table('adminlogs')->orderBy('logid', 'DESC')->get();

            return view('/admin/viewlogs',['log'=>$log]);
        }
        else{
                    return view('/admin/login');
        }
    }

}
