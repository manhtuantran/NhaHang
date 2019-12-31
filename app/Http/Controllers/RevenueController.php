<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Revenue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    //
    public function getDanhsach()
    {
        if(Auth::user()->level=='admin')
        {
            $allRevenue = Revenue::all();
        }
        else
        {
            $allRevenue = Revenue::where('id_restaurant','=',Auth::user()->id_restaurant)->get();
        }
        return view('admin.revenue.danhsach',['allRevenue'=>$allRevenue]);
    }

    public function getHomnay()
    {
        if(Auth::user()->level=='admin')
        {
            $toDay = (date('d'));
            $dayRevenue = Revenue::whereDay('date',$toDay)->get();
        }
        else
        {
            $toDay = (date('d'));
            $dayRevenue = Revenue::whereDay('date',$toDay)->where('id_restaurant','=',Auth::user()->id_restaurant)->get();

        }
        return view('admin.revenue.homnay',['dayRevenue'=>$dayRevenue]);
    }

    public function getThangnay()
    {
        if(Auth::user()->level=='admin')
        {
            $month = (date('m'));
            $monthRevenue = Revenue::whereMonth('date',$month)->get();
        }
        else
        {
            $month = (date('m'));
            $monthRevenue = Revenue::whereMonth('date',$month)->where('id_restaurant','=',Auth::user()->id_restaurant)->get();

        }
        return view('admin.revenue.thangnay',['monthRevenue'=>$monthRevenue]);
    }

    public function getNamnay()
    {
        if(Auth::user()->level=='admin')
        {
            $year = (date('Y'));
            $yearRevenue = Revenue::whereYear('created_at',$year)->paginate(10);
        }
        else
        {
            $year = (date('Y'));
            $yearRevenue = Revenue::whereYear('created_at',$year)->where('id_restaurant','=',Auth::user()->id_restaurant)->paginate(10);

        }

        return view('admin.revenue.namnay',['yearRevenue'=>$yearRevenue]);
    }

    public function getUser()
    {
        if(Auth::user()->level=='admin')
        {
            $orderUser = User::where('level','=','Order')->get();
        }
        else
        {
            $orderUser = User::where([['level','=','Order'],['id_restaurant','=',Auth::user()->id_restaurant]])->get();

        }
        return view('admin.revenue.user',['orderUser'=>$orderUser]);
    }

    public function postUser(Request $request)
    {
        $orderUserRevenue = DB::table('revenue')
            ->join('users','revenue.id_user','=','users.id')
            ->join('restaurants','revenue.id_restaurant','=','restaurants.id')
            ->where('revenue.id_user','=',$request->idUser)
            ->select('restaurants.name','revenue.date','revenue.total_revenue')->get();
        echo json_encode($orderUserRevenue);
    }
}
