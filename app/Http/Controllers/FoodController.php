<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Food;
use App\Recipe;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    //
    public function getDanhsach()
    {
        $recipe = Recipe::all();
        if(Auth::user()->level=='admin')
        {
            $allFood = Food::all();
        }
        else
        {
            $allFood = Food::where('id_restaurant','=',Auth::user()->id_restaurant)->get();
        }
        return view('admin.food.danhsach',['allFood'=>$allFood,'recipe'=>$recipe]);
    }

    public function getThem()
    {
        if(Auth::user()->level=='admin')
        {
            $allRestaurant =  Restaurant::all();
        }
        else
        {
            $allRestaurant = Restaurant::where('id','=',Auth::user()->id_restaurant)->get();
        }
        return view('admin.food.them',['allRestaurant'=>$allRestaurant]);
    }

    public function postThem(Request $request)
    {
        $food = new Food;
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->id_restaurant = $request->restaurant;
        $food->save();

        return redirect('admin/food/them')->with('thongbao','Thêm món ăn thành công');
    }

    public function getSua($id)
    {
        $foodDetail = Food::find($id);
        $allRestaurant = Restaurant::all();
        return view('admin.food.sua',['foodDetail'=>$foodDetail,'allRestaurant'=>$allRestaurant]);
    }

    public function postSua(Request $request, $id)
    {
        $food = Food::find($id);
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->save();

        return redirect('admin/food/sua/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getXoa($id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect('admin/food/danhsach')->with('thongbao','Xóa món ăn thành công');
    }
}
