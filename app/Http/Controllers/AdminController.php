<?php

namespace App\Http\Controllers;
use App\Models\User;
use DB;
use Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
        return view('admin.admin');
    }

    public function getAllUser()
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }

        $data_user=DB::table('users')->get();
        Session::put('soluong',count(($data_user)));
        return view('admin.user', compact('data_user'));
    }
}
