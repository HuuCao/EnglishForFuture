<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\User;
use App\Models\Exam;
use App\Models\Result;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome()
    {
        $course = Course::with('lessons')->get();
        return view('home.index', compact('course'));
    }

    public function login()
    {
        if (Session::get('role') != null) {
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

        $dataEmail = User::where('email', $request->email)->where('is_active', 1)->first();
        if ($dataEmail != null) {
            return redirect('register')->with('errthongbao', 'Email đã tồn tại');
        }

        $dataUsername = User::where('username', $request->username)->where('is_active', 1)->first();
        if ($dataUsername != null) {
            return redirect('register')->with('errthongbao', 'Username đã tồn tại');
        }

        if ($request->username == trim($request->username) && strpos($request->username, ' ')) {
            return redirect('register')->with('errthongbao', 'Username ko dc co khoangtrang!');
        } else {
            $user->username = $request->username;
        }
        if ($request->pword == $request->pword2) {
            $user->password = MD5($request->pword);
        } else {
            return redirect('register')->with('errthongbao', 'Nhập lại mật khẩu không đúng!');
        }
        // dd($request);
        $user->role = 2;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthday = $request->birthday;
        $user->sex = $request->sex;
        $user->phone = $request->phone;
        $user->save();

        return redirect('login');
    }
    public function postLogin(Request $request)
    {
        $user = User::where('username', $request->username)->where('password', MD5($request->pword))->where('is_active', 1)->first();
        if ($user != null) {
            if ($user->role == 1) {
                Session::put('role', $user->role);
                return redirect('admin');
            } else if ($user->role == 2) {
                Session::put('username', $user->username);
                Session::put('email', $user->email);
                return redirect("/home");
            } else {
                return redirect('login');
            }
        } else {
            $user = User::where('email', $request->username)->where('password', MD5($request->pword))->where('is_active', 1)->first();
            if ($user != null) {
                if ($user->role == 1) {
                    Session::put('role', $user->role);
                    return redirect('admin');
                } else if ($user->role == 2) {
                    Session::put('email', $user->email);
                    Session::put('username', $user->username);
                    return redirect("/home");
                } else {
                    return redirect('login');
                }
            } else {
                return redirect('login')->with('errthongbao', 'Sai thông tin đăng nhập. Vui lòng nhập lại!');
            }
        }
    }

    public function course()
    {
        $course = Course::with('lessons')->get();
        // return $course;
        return view('home.course', compact('course'));
    }

    public function listTest()
    {
        $exam = Exam::with('questions')->get();
        return view('home.common.list-test', compact('exam'));
    }

    public function listLesson()
    {
        $lessons = Course::with('lessons')->get();
        // foreach ($lessons as $lesson)
        // {
        //     return $lesson->lessons;
        // }
        return view('home.common.lesson', compact('lessons'));
    }

    public function detailTest($id)
    {
        // dd($id);

        $listQuestion = Question::all()->where('exam_id', $id);
        // $listQuestion = $testDetail->map->question->first();
        $listQuestionP1 = $listQuestion->slice(0, 6);
        $listQuestionP2 = $listQuestion->slice(6, 25);
        $listQuestionP3 = $listQuestion->slice(31, 39);
        $listQuestionP4 = $listQuestion->slice(70, 30);
        $listQuestionP5 = $listQuestion->slice(100, 30);
        $listQuestionP6 = $listQuestion->slice(130, 16);
        $listQuestionP7_2 = $listQuestion->slice(146, 8);
        $listQuestionP7_3 = $listQuestion->slice(154, 9);
        $listQuestionP7_4 = $listQuestion->slice(163, 12);
        $listQuestionP7_5 = $listQuestion->slice(175, 25);
        // dd($listQuestionP7_4);
        return view('home.test.test-detail')->with([
            'id' => $id,
            'listQuestionP1' => $listQuestionP1,
            'listQuestionP2' => $listQuestionP2,
            'listQuestionP3' => $listQuestionP3,
            'listQuestionP4' => $listQuestionP4,
            'listQuestionP5' => $listQuestionP5,
            'listQuestionP6' => $listQuestionP6,
            'listQuestionP7_2' => $listQuestionP7_2,
            'listQuestionP7_3' => $listQuestionP7_3,
            'listQuestionP7_4' => $listQuestionP7_4,
            'listQuestionP7_5' => $listQuestionP7_5,
        ]);
    }

    public function result(Request $request)
    {
        $correctListen = 0;
        $correctReading = 0;
        $answer = collect($request->answer);
        foreach ($answer as $key => $value) {
            // echo $key;
            if (Question::where('id', $key)->where('number_for_exam', ">", 100)->first()) {
                if (Question::where('id', $key)->first()->correct_answer == $value) {
                    $correctReading++;
                }
            } else {
                if (Question::where('id', $key)->first()->correct_answer == $value) {
                    $correctListen++;
                }
            }
        }
        $scoreListening = [
            '0', '5', '5', '5', '5', '5', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50', '55', '60', '65', '70', '75', '80', '85', '90', '95', '100', '110', '115', '120', '125', '130', '135', '140', '145', '150', '160', '165', '170', '175', '180', '185', '190', '195', '200', '210', '215', '220', '230', '240', '245', '250', '255', '260', '270', '275', '280', '290', '295', '300', '310', '315', '320', '325', '330', '340', '345', '350', '360', '365', '370', '380', '385', '390', '395', '400', '405', '410', '420', '425', '430', '440', '445', '450', '460', '465', '470', '475', '480', '485', '490', '495', '495', '495', '495', '495', '495', '495', '495', '495', '495', '495'
        ];

        $scoreReading = [
            '0', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50', '60', '65', '70', '80', '85', '90', '95', '100', '110', '115', '120', '125', '130', '140', '145', '150', '160', '165', '170', '175', '180', '190', '195', '200', '210', '215', '220', '225', '230', '235', '240', '250', '255', '260', '265', '270', '280', '285', '290', '300', '305', '310', '320', '325', '330', '335', '340', '350', '355', '360', '365', '370', '380', '385', '390', '395', '400', '405', '410', '415', '420', '425', '430', '435', '445', '450', '455', '465', '470', '480', '485', '490', '495', '495', '495', '495'
        ];

        $markListening = $scoreListening[$correctListen];
        $markReading = $scoreReading[$correctReading];

        Result::create([
            'listen' => $correctListen,
            'reading' => $correctReading,
            'point' => $markListening + $markReading,
            'user_id' => Session::get('id'),
            'exam_id' => $request->id,
        ]);

        return response([
            'message' => "Congratulations",
            'correct_answer' => $correctListen + $correctReading,
            'listening' => $scoreListening[($correctListen)],
            'reading' => $scoreReading[($correctReading)],
            'total' => $markListening + $markReading,
        ]);
    }
}
