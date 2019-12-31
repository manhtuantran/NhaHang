<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\Container;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    //
    public function getDanhsach()
    {
        if(Auth::user()->level=='admin')
        {
            $allMaterial = Material::all();
            $container = Container::all();
        }
        else
        {
            $allMaterial = DB::table('materials')
                ->select('materials.id','materials.name','materials.quantity','materials.id_container')
                ->join('containers','materials.id_container','=','containers.id')
                ->join('restaurants','containers.id_restaurant','=','restaurants.id')
                ->where('restaurants.id','=',Auth::user()->id_restaurant)->get();

            $container = Container::where('id_restaurant','=',Auth::user()->id_restaurant)->first();
        }


        return view('admin.material.danhsach',['allMaterial'=>$allMaterial,'container'=>$container]);
    }

    public function getThem()
    {
        $allContainer = Container::all();
        $container = Container::where('id_restaurant','=',Auth::user()->id_restaurant)->first();
        return view('admin.material.them',['allContainer'=>$allContainer,'container'=>$container]);
    }

    public function postThem(Request $request)
    {
        $material = new Material;
        $material->name = $request->name;
        $material->quantity = $request->quantity;
        $material->id_container = $request->container;
        $material->save();

        return redirect('admin/material/them')->with('thongbao','Thêm thành công nguyên liệu');
    }

    public function getSua($id)
    {
        $allContainer = Container::all();
        $container = Container::where('id_restaurant','=',Auth::user()->id_restaurant)->first();
        $materialDetail = Material::find($id);
        return view('admin.material.sua',
            ['materialDetail'=>$materialDetail,'container'=>$container,'allContainer'=>$allContainer]);
    }

    public function postSua(Request $request, $id)
    {
        $material = Material::find($id);
        $material->name = $request->name;
        $material->quantity = $request->quantity;
        $material->id_container = $request->container;
        $material->save();
        return redirect('admin/material/sua/'.$id)->with('thongbao','Sửa thông tin nguyên liệu thành công');
    }
}
