<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Session;

class UserController extends Controller
{
    public function index()
    {
        return view('fronted.user.create');
    }


    public function add_user(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|max:32',
                're_password' => 'required|same:password',
                'phone' => 'required|min:10|max:11',
                'address' => 'required',
            ],[
                'name.required' => 'Bạn chưa nhập tên',
                'name.min' => 'Tên phải có độ dài từ 3 đến 100 ký tự',
                'name.max' => 'Tên phải có độ dài từ 3 đến 100 ký tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có độ dài từ 8 đến 32 ký tự',
                'password.max' => 'Mật khẩu phải có độ dài từ 8 đến 32 ký tự',
                're_password.required' => 'Bạn chưa nhập lại mật khẩu',
                're_password.same' => 'Mật khẩu nhập lại chưa đúng',
            ]);

        $data = array();
        $data2 = array();
        $data['name']  = $request->name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password, false);
        $data['phone'] = $request->phone;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $insert = DB::table('users')->insertGetId($data);
        $data2['address'] = $request->address;
        $data2['user_id'] = $insert;
        $insert2 = DB::table('address')->insert($data2);
        Session::put('id', $insert);
        Session::put('name', $request->name);
        return Redirect()->Route('get.home');
    }

    public function forgot_password()
    {
        return view('fronted.user.forgetPassword');
    }
    public function forgot_password_post(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            $this->validate($request, [
                'email' => 'required|email',
            ], [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
            ]);
            $token = Str::random(20);
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            Mail::send('fronted.user.forgetPasswordEmail', ['token' => $token], function ($message) use ($email) {
                $message->to($email)->subject('Lấy lại mật khẩu');
            });
            return Redirect::back()->with('email_success', 'Đã gửi link vào email của bạn');
        } else {
            return redirect()->back()->with('email_error', 'Email không tồn tại');
        }
    }
    public function reset_password($token)
    {
        return view('fronted.user.forgetPasswordLink', ['token' => $token]);
    }
    public function reset_password_post(Request $request, $token)
    {
        $this->validate($request, [
            'password' => 'required|min:8|max:20',
            'cf_password' => 'required|same:password',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.max' => 'Mật khẩu không được vượt quá 20 ký tự',
            'cf_password.required' => 'Vui lòng nhập lại mật khẩu',
            'cf_password.same' => 'Mật khẩu không trùng khớp',
        ]);
        $updatePassword = DB::table('password_resets')->where('token', $request->token)->first();
        if(!$updatePassword){
            return redirect()->back()->with('token_error', 'Mã token không tồn tại');
        }
        DB::table('users')->where('email', $updatePassword->email)->update([
            'password' => md5($request->password),
        ]);
        DB::table('password_resets')->where('token', $request->token)->delete();
        return Redirect()->route('login')->with('change_password','Mat khau da duoc thay doi');
    }
}
