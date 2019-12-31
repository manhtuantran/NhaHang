<?php

namespace App\Http\Controllers;

use App\Desk;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeskController extends Controller
{
    //
    public function getDanhsach()
    {
        if(Auth::user()->level=='admin')
        {
            $allDesk = Desk::paginate(10);
        }
        else
        {
            $allDesk = Desk::where('id_restaurant','=',Auth::user()->id_restaurant)->get();
        }

        return view('admin.desk.danhsach', ['allDesk' => $allDesk]);
    }

    public function postOrder(Request $request)
    {
        $desk = Desk::find($request->idTable);
        $desk->is_ordered = 1;
        $desk->save();
        return $desk;
    }

    public function postPayment(Request $request)
    {
        $desk = Desk::find($request->idTable);
        $desk->is_ordered = 0;
        $desk->save();
        return $desk;
    }

    public function getThem()
    {
        $allRestaurant = Restaurant::all();
        return view('admin.desk.them', ['allRestaurant' => $allRestaurant]);
    }

    public function postThem(Request $request)
    {
        $desk = new Desk;
        $desk->name = $request->name;
        $desk->is_ordered = 0;
        $desk->id_restaurant = $request->restaurant;
        $desk->save();

        return redirect('admin/desk/them')->with('thongbao', 'Thêm bàn thành công');
    }

    public function getSua($idBan)
    {
        $allRestaurant = Restaurant::all();
        $desk = Desk::where('id','=',$idBan)->first();
        return view('admin.desk.sua',['desk'=>$desk,'allRestaurant'=>$allRestaurant]);
    }

    public function postSua(Request $request, $idBan)
    {
        $desk = Desk::find($idBan);
        $desk->name = $request->name;
        $desk->id_restaurant = $request->restaurant;
        $desk->save();

        return redirect('admin/desk/sua/'.$idBan)->with('thongbao','Thay đổi thông tin bàn thành công');
    }

    public function getXoa($idBan)
    {
        $desk = Desk::find($idBan);
        if(isset($desk))
        {
            $desk->delete();
        }

        if(Auth::user()->level=='admin')
        {
            $allDesk = Desk::paginate(10);
        }
        else
        {
            $allDesk = Desk::where('id_restaurant','=',Auth::user()->id_restaurant)->get();
        }

        return view('admin.desk.danhsach', ['allDesk' => $allDesk]);
    }
}
