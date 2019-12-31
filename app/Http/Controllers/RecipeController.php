<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use App\Recipe;
use App\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{

    public function getCongThuc($id)
    {
        $allMaterial = Material::all();
        $food = Food::find($id);
        $recipe = Recipe::where('id_food',$id)->get();
        return view('admin.recipe.congthuc',['recipe'=>$recipe,'food'=>$food,'allMaterial'=>$allMaterial]);
    }

    public function getThem($id)
    {
        $allMaterial = DB::table('materials')
            ->select('materials.id','materials.name','materials.quantity','materials.id_container')
            ->join('containers','materials.id_container','=','containers.id')
            ->join('restaurants','containers.id_restaurant','=','restaurants.id')
            ->where('restaurants.id','=',Auth::user()->id_restaurant)->get();
        $food = Food::find($id);
        return view('admin.recipe.them',['food'=>$food,'allMaterial'=>$allMaterial]);
    }

    public function postThem(Request $request, $id)
    {
        foreach ($request->name as $index => $name)
        {
            $recipe = new Recipe;
            $recipe->id_food = $id;
            $recipe->id_material = $name;
            $recipe->quantity = $request->quantity[$index];
            $recipe->save();
        }

        return redirect('admin/recipe/them/'.$id)->with('thongbao','Tạo công thức thành công');
    }

    public function postSua(Request $request, $idFood)
    {
        Recipe::where('id_food',$idFood)->delete();
        foreach ($request->name as $index => $name)
        {
            $recipe = new Recipe;
            $recipe->id_food = $idFood;
            $recipe->id_material = $name;
            $recipe->quantity = $request->quantity[$index];
            $recipe->save();
        }
        $allMaterial = Material::all();
        $food = Food::find($idFood);
        $recipe = Recipe::where('id_food',$idFood)->get();
        $request->session()->flash('thongbao', 'Thay đổi công thức thành công');
        return view('admin.recipe.congthuc',['recipe'=>$recipe,'food'=>$food,'allMaterial'=>$allMaterial]);
    }
}
