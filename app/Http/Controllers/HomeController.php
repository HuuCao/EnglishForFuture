<?php

namespace App\Http\Controllers;
use App\Models\User;
use DB;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome()
    {
        return view('home.index');
    }

    public function login()
    {
        if(Session::get('role')!=null){
            return redirect('admin');
        }
        return view('home.login');
    }

    public function register()
    {
        return view('home.register');
    }

    public function logout()
    {
        Session::put("role", "");
        Session::put("username", "");

        return redirect("login");
    }

    public function postRegister(Request $request)
    {
        Session::put('username', $request->username);
        Session::put('email', $request->email);
        Session::put('first_name', $request->first_name);
        Session::put('last_name', $request->last_name);
        Session::put('brithday', $request->brithday);
        Session::put('sex', $request->sex);
        Session::put('phone', $request->phone);
        $user = new User;

        $dataEmail=User::where('email',$request->email)->where('is_active', 1)->first();
        if($dataEmail!=null){
            return redirect('register')->with('errthongbao','Email đã tồn tại');
        }

        $dataUsername=User::where('username',$request->username)->where('is_active', 1)->first();
        if($dataUsername!=null){
            return redirect('register')->with('errthongbao','Username đã tồn tại');
        }

        if ($request->username == trim($request->username) && strpos($request->username, ' ')) { 
            return redirect('register')->with('errthongbao','Username ko dc co khoangtrang!');
        }else{
            $user->username=$request->username;
        }
        if ($request->pword == $request->pword2) {
            $user->password=MD5($request->pword);
        } else {
            return redirect('register')->with('errthongbao','Nhập lại mật khẩu không đúng!');
        }
        // dd($request);
        $user->role=2;
        $user->email=$request->email;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->birthday=$request->birthday;
        $user->sex=$request->sex;
        $user->phone=$request->phone;
        $user->save();

        return redirect('login');
    }
    public function postLogin(Request $request)
    {
        $user = User::where('username', $request->username)->where('password', MD5($request->pword))->where('is_active', 1)->first();
        if ($user != null) {
            if ($user->role == 1) {
                Session::put('role',$user->role);
                return redirect('admin');
            } else if ($user->role == 2) {
                Session::put('username',$user->username);
                Session::put('email',$user->email);
                return redirect("/");
            }
             else {
                return redirect('login');
            }
        } else {
            $user = User::where('email', $request->username)->where('password', MD5($request->pword))->where('is_active', 1)->first();
            if ($user != null) {
                if ($user->role == 1) {
                    Session::put('role',$user->role);
                    return redirect('admin');
                } else if ($user->role == 2) {
                    Session::put('email',$user->email);
                    Session::put('username',$user->username);
                    return redirect("/");
                }
                 else {
                    return redirect('login');
                }
            } else {
                return redirect('login')->with('errthongbao','Sai thông tin đăng nhập. Vui lòng nhập lại!');
            }
        }
    }

    public function course()
    {
        $course = DB::table('course')->get();
        return view('home.course',compact('course'));
    }


}

