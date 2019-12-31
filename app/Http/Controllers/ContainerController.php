<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;
use App\Restaurant;

class ContainerController extends Controller
{
    //
    public function getDanhsach()
    {
        $allContainer = Container::all();
        return view('admin.container.danhsach',['allContainer'=>$allContainer]);
    }

    public function getThem()
    {
        $allRestaurant = Restaurant::all();
        return view('admin.container.them',['allRestaurant'=>$allRestaurant]);
    }

    public function postThem(Request $request)
    {
        $container = new Container();
        $container->name = $request->name;
        $container->id_restaurant = $request->restaurant;
        $container->save();

        return redirect('admin/container/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $allRestaurant = Restaurant::all();
        $containerDetail = Container::find($id);
        return view('admin.container.sua',['containerDetail'=>$containerDetail,'allRestaurant'=>$allRestaurant]);
    }

    public function postSua(Request $request, $id)
    {
        $container = Container::find($id);
        $container->name = $request->name;
        $container->id_restaurant = $request->restaurant;
        $container->save();

        return redirect('admin/container/sua/'.$id)->with('thongbao','Sửa thông tin kho hàng thành công');
    }

    public function getXoa($id)
    {
        $container = Container::find($id);
        $container->delete();

        return redirect('admin/container/danhsach')->with('thongbao','Xóa kho hàng thành công');
    }
}
