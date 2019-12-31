<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Restaurant;

class UserController extends Controller
{
    //
    public function getDangnhap()
    {
        return view('admin.login');
    }


    public function postDangnhap(Request $request)
    {
        $this->validate($request,
            [
                'username'=>'required',
                'password'=>'required|min:1|max:32'
            ],
            [
                'username.required'=>'Bạn chưa nhập username',
                'password.required'=>'Bạn chưa nhập pass word',
                'password.min'=>'Password không được nhỏ hơn 1 ký tự',
                'password.max'=>'Password không được lớn hơn 32 kí tự'
            ]);
        if(Auth::attempt(['username'=>$request->username,'password'=>$request->password]))
        {
            if(Auth::user()->is_locked==0) {
                return redirect('admin/layout/index');
            }
            else {
                return redirect('admin/dangnhap')->with('thongbao','Tài khoản đã bị khóa');
            }
        }
        else{
            return redirect('admin/dangnhap')->with('thongbao','Sai thông tin tài khoản');
        }
    }

    public function index()
    {
        return view('admin.layout.index');
    }

    public function getDanhsach($idNhaHang)
    {
        if(Auth::user()->level=='admin')
        {
            $allUser = User::all();
        }
        else
        {
            $allUser = User::where('id_restaurant','=',$idNhaHang)->get();
        }
        return view('admin.user.danhsach',['allUser'=>$allUser]);
    }

    public function getThem()
    {
        if(Auth::user()->level=='admin')
        {
            $allRestaurant = Restaurant::all();
        }
        else
        {
            $allRestaurant = Restaurant::where('id','=',Auth::user()->id_restaurant)->get();
        }
        return view('admin.user.them',['allRestaurant'=>$allRestaurant]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'username' => 'required',
                'name' => 'required',
                'password' => 'required|min:1|max:32',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'username.required' => 'Bạn chưa nhập username',
                'name.required' => 'Bạn chưa nhập tên',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có độ dài từ 1 đến 32 kí tự',
                'password.max' => 'Mật khẩu phải có độ dài từ 1 đến 32 kí tự',
                'passwordAgain.require' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Mật khẩu không trùng khớp'
            ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->id_restaurant = $request->restaurant;
        $user->save();

        return redirect('admin/user/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
            ]);
        $user = User::find($id);
        $user->name = $request->name;
        if($request->changePassword == "on")
        {
            $this->validate($request,
                [
                    'password' => 'required|min:1|max:32',
                    'passwordAgain' => 'required|same:password'
                ],
                [
                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu phải có độ dài từ 1 đến 32 kí tự',
                    'password.max' => 'Mật khẩu phải có độ dài từ 1 đến 32 kí tự',
                    'passwordAgain.require' => 'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same' => 'Mật khẩu không trùng khớp'
                ]);
            $user->password = bcrypt($request->password);
        }
        $user->level = $request->level;
        $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thông tin nhân viên thành công');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/danhsach')->with('thongbao','Xóa nhân viên thành công');
    }

    public function getKhoa($idNhanVien)
    {
        $user = User::find($idNhanVien);
        $user->is_locked = 1;
        $user->save();
        $idNhaHang = Auth::user()->id_restaurant;
        return redirect('admin/user/danhsach/'.$idNhaHang);
    }

    public function getMoKhoa($idNhanVien)
    {
        $user = User::find($idNhanVien);
        $user->is_locked = 0;
        $user->save();
        $idNhaHang = Auth::user()->id_restaurant;
        return redirect('admin/user/danhsach/'.$idNhaHang);
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
