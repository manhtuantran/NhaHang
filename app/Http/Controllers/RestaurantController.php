<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    //
    public function getDanhsach()
    {
        $allRestaurant = Restaurant::all();
        return view('admin.restaurant.danhsach',['allRestaurant'=>$allRestaurant]);
    }

    public function getThem()
    {
        return view('admin.restaurant.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'location' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên nhà hàng',
                'location.required' => 'Bạn chưa nhập địa điểm',
            ]);

        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->location = $request->location;
        $restaurant->save();

        return redirect('admin/restaurant/them')->with('thongbao','Thêm nhà hàng thành công');
    }

    public function getSua($id)
    {
        $restaurantDetail = Restaurant::find($id);
        return view('admin/restaurant/sua',['restaurantDetail'=>$restaurantDetail]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'location' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên nhà hàng',
                'location.required' => 'Bạn chưa nhập địa điểm',
            ]);
        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->name;
        $restaurant->location = $request->location;
        $restaurant->save();

        return redirect('admin/restaurant/sua/'.$id)->with('thongbao','Sửa thông tin nhà hàng thành công');
    }

    public function getXoa($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        return redirect('admin/restaurant/danhsach')->with('thongbao','Xóa nhà hàng thành công');
    }
}
