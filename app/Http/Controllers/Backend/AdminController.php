<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendStaffRequest;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        $staff = DB::table('admins')->get();
        $id = Session::get('id');
        $staff2 = DB::table('admins')->where('id', $id)->first();
        return view('backend.staff.index', compact('staff', 'staff2'));
    }
    public function add_staff()
    {
        return view('backend.staff.add_account');
    }
    public function add_account(BackendStaffRequest $request)
    {
        $data = $request->all();
            $account = new Admin;
            $account->name = $data['name'];
            $account->email = $data['email'];
            $account->phone = $data['phone'];
            $account->address = $data['address'];
            $account->password = md5($data['password']);
            $account->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $account->save();
            return redirect()->route('get_backend.staff.index')->with('add_success', 'Đã thêm nhân viên thành công');
    }
    public function promotion($id)
    {
        $level = DB::table('admins')->where('id', $id)->select('level')->first();
        $data = array();
        if ($level->level == 2) {
            $data['level'] = 1;
        } else if ($level->level == 1) {
            $data['level'] = 2;
        }
        DB::table('admins')->where('id', $id)->update($data);
        return redirect()->back();
    }
    public function delete_account($id)
    {
        DB::table('admins')->where('id', $id)->delete();
        return redirect()->back();
    }
}
