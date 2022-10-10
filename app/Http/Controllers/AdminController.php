<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\User_Course;
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
    // ==================================== //
    //                 USER                 //
    // ==================================== //
    public function getAllUser()
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }

        $data_user=DB::table('tbl_user')->where('is_active', 1)->get();
        Session::put('soluong',count(($data_user)));
        return view('admin.users.user', compact('data_user'));
    }

    public function addUser()
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
        return view("admin.users.add");
    }
    
    public function postAddUser(Request $request)
    {
        Session::put('username', $request->username);
        Session::put('email', $request->email);
        $user = new User;

        $dataEmail=User::where('email',$request->email)->where('is_active', 1)->first();
        if($dataEmail!=null){
            return redirect('register')->with('error','Email đã tồn tại');
        }

        $dataUsername=User::where('username',$request->username)->where('is_active', 1)->first();
        if($dataUsername!=null){
            return redirect('register')->with('error','Username đã tồn tại');
        }

        if ($request->username == trim($request->username) && strpos($request->username, ' ')) { 
            return redirect('register')->with('error','Username ko dc co khoangtrang!');
        }else{
            $user->username=$request->username;
        }
        if ($request->pword == $request->pword2) {
            $user->password=MD5($request->pword);
        } else {
            return redirect('register')->with('error','Nhập lại mật khẩu không đúng!');
        }
        $user->role=3; //role 3 là giáo viên
        $user->email=$request->email;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->birthday=$request->birthday;
        $user->sex=$request->sex;
        $user->phone=$request->phone;
        $user->save();

        return redirect('admin/user');
    }

    public function editUser($id)
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
            $data_user=User::find($id);
            // dd($data_user);
            return view('admin.users.edit',compact('data_user'));
    }

    public function postEditUser(Request $request, $id)
    {
        $username=$request->username;
        $first_name=$request->first_name;
        $last_name=$request->last_name;
        $birthday=$request->birthday;
        $phone=$request->phone;
        $sex=$request->sex;

        $check_data=User::where('username',$username)
            ->where('first_name',$first_name)
            ->where('last_name',$last_name)
            ->where('birthday',$birthday)
            ->where('phone',$phone)
            ->where('sex',$sex)
            ->where('id','<>',$id)
            ->first();
            // dd($check_data);
        if($check_data==null){
            $user= User::find($id);
            $user->username=$request->username;
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->birthday=$request->birthday;
            $user->phone=$request->phone;
            $user->sex=$request->sex;
            $user->save();
            return redirect('admin/user');

        }
        else{
            Session::put('username',$username);
            Session::put('first_name',$first_name);
            Session::put('last_name',$last_name);
            Session::put('birthday',$birthday);
            Session::put('phone',$phone);
            Session::put('sex',$sex);
            return back()->with('error','Thông tin không hợp lệ vui lòng kiểm tra lại');
        }
    }

    public function deleteUser(Request $request, $id)
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
        $data_user=User::find($id);
        $data_user->is_active = 0;
        $data_user->save();
        return redirect('admin/user')->with('success', 'User deleted successfully!');
    }

    // ==================================== //
    //                 COURSE               //
    // ==================================== //

    public function getAllCourse()
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }

        $data_course=Course::where('is_active', 1)->get();
        Session::put('soluong',count(($data_course)));
        return view('admin.courses.course', compact('data_course'));
    }

    public function addCourse()
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
        return view("admin.courses.add");
    }
    
    public function postAddCourse(Request $request)
    {
        $course = new Course;

        $dataTitle=Course::where('title',$request->title)->where('is_active', 1)->first();
        if($dataTitle!=null){
            return redirect('admin/course')->with('error','Tiêu đề đã tồn tại');
        }

        $dataCaption=Course::where('caption',$request->caption)->where('is_active', 1)->first();
        if($dataCaption!=null){
            return redirect('admin/course')->with('error','Caption đã tồn tại');
        }
        $course->title=$request->title;
        $course->caption=$request->caption;
        $course->description=$request->description;
        $course->price=$request->price;
        $course->time=$request->time;
        $course->image=$request->image;
        $course->save();

        return redirect('admin/course');
    }

    public function editCourse($id)
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
            $data_course=Course::find($id);
            // dd($data_user);
            return view('admin.courses.edit',compact('data_course'));
    }

    public function postEditCourse(Request $request, $id)
    {
        $title=$request->title;
        $caption=$request->caption;
        $description=$request->description;
        $price=$request->price;
        $time=$request->time;
        $image=$request->image;

        $check_data=Course::where('title',$title)
            ->where('caption',$caption)
            ->where('description',$description)
            ->where('price',$price)
            ->where('time',$time)
            ->where('id','<>',$id)
            ->first();
            // dd($check_data);
        if($check_data==null){
            $course= Course::find($id);
            $course->title=$request->title;
            $course->caption=$request->caption;
            $course->description=$request->description;
            $course->price=$request->price;
            $course->time=$request->time;
            $course->image=$request->image;
            $course->save();
            return redirect('admin/course');

        }
        else{
            Session::put('title',$title);
            Session::put('caption',$caption);
            Session::put('description',$description);
            Session::put('price',$price);
            Session::put('time',$time);
            Session::put('image',$image);
            return back()->with('error','Thông tin không hợp lệ vui lòng kiểm tra lại');
        }
    }

    public function deleteCourse(Request $request, $id)
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
        $data_course=Course::find($id);
        $data_course->is_active = 0;
        $data_course->save();
        return redirect('admin/course')->with('success', 'User deleted successfully!');
    }

    // ==================================== //
    //                 COURSE               //
    // ==================================== //

    public function getAllLesson()
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }

        $data_course=Course::where('is_active', 1)->get();
        Session::put('soluong',count(($data_course)));
        return view('admin.courses.course', compact('data_course'));
    }

    public function addLesson()
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
        return view("admin.courses.add");
    }
    
    public function postAddLesson(Request $request)
    {
        $course = new Course;

        $dataTitle=Course::where('title',$request->title)->where('is_active', 1)->first();
        if($dataTitle!=null){
            return redirect('admin/course')->with('error','Tiêu đề đã tồn tại');
        }

        $dataCaption=Course::where('caption',$request->caption)->where('is_active', 1)->first();
        if($dataCaption!=null){
            return redirect('admin/course')->with('error','Caption đã tồn tại');
        }
        $course->title=$request->title;
        $course->caption=$request->caption;
        $course->description=$request->description;
        $course->price=$request->price;
        $course->time=$request->time;
        $course->image=$request->image;
        $course->save();

        return redirect('admin/course');
    }

    public function editLesson($id)
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
            $data_course=Course::find($id);
            // dd($data_user);
            return view('admin.courses.edit',compact('data_course'));
    }

    public function postEditLesson(Request $request, $id)
    {
        $title=$request->title;
        $caption=$request->caption;
        $description=$request->description;
        $price=$request->price;
        $time=$request->time;
        $image=$request->image;

        $check_data=Course::where('title',$title)
            ->where('caption',$caption)
            ->where('description',$description)
            ->where('price',$price)
            ->where('time',$time)
            ->where('id','<>',$id)
            ->first();
            // dd($check_data);
        if($check_data==null){
            $course= Course::find($id);
            $course->title=$request->title;
            $course->caption=$request->caption;
            $course->description=$request->description;
            $course->price=$request->price;
            $course->time=$request->time;
            $course->image=$request->image;
            $course->save();
            return redirect('admin/course');

        }
        else{
            Session::put('title',$title);
            Session::put('caption',$caption);
            Session::put('description',$description);
            Session::put('price',$price);
            Session::put('time',$time);
            Session::put('image',$image);
            return back()->with('error','Thông tin không hợp lệ vui lòng kiểm tra lại');
        }
    }

    public function deleteLesson(Request $request, $id)
    {
        if (Session::get('role') == null)
        {
            return redirect('login');
        }
        $data_course=Course::find($id);
        $data_course->is_active = 0;
        $data_course->save();
        return redirect('admin/course')->with('success', 'User deleted successfully!');
    }

    public function getAll()
    {
        $users = User::with('user_course')->get()->toArray();
        echo '<pre>';
        dd($users);
    }
}
