<?php

namespace App\Http\Controllers;

use App\Desk;
use App\Revenue;
use Illuminate\Http\Request;
use App\Order;
use App\Food;
use App\OrderDetail;
use App\Material;
use App\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function getDanhsach()
    {
        $allOrder = Order::orderBy('id','DESC')->paginate(10);
        return view('admin.order.danhsach',['allOrder'=>$allOrder]);
    }

    public function getTao()
    {
        $idRestaurant = Auth::user()->id_restaurant;
        if(Auth::user()->level=='admin')
        {
            $allFood = Food::all();
        }
        else
        {
            $allFood = Food::where('id_restaurant','=',Auth::user()->id_restaurant)->get();
        }
        $allDeskAreNotOrdered = Desk::where([
            ['is_ordered','=',0],
            ['id_restaurant','=',$idRestaurant]
        ])->get();
        return view('admin.order.tao',['allFood'=>$allFood,'allDeskAreNotOrdered'=>$allDeskAreNotOrdered]);
    }

    public function postTao(Request $request)
    {
        //Chuyen trang thai dat ban thanh 1
        $desk = Desk::where('id','=',$request->idDesk)->first();
        $desk->is_ordered = 1;
        $desk->save();

        //Luu thong tin vao bang orders
        $order = new Order;
        $order->id_user = Auth::user()->id;
        $order->id_desk = $request->idDesk;
        $order->customer_name = $request->customer_name;
        $order->phone_number = $request->phone_number;
        $order->address = $request->address;
        $order->is_ordered = 1;
        $order->is_payment = 0;
        $order->save();

        //lay id cua lan save cuoi
        $id_order = $order->id;
        //Luu du lieu vao bang order-detail
        foreach ($request->foodName as $index => $food)
        {
            $i = 0;
            $foodDetail = Food::find($food);
            $priceFood = $foodDetail->price;
            $orderDetail = new OrderDetail;
            $orderDetail->id_order = $id_order;
            $orderDetail->id_food = $food[$i];
            $orderDetail->quantity = $request->quantity[$i];
            $orderDetail->total_amount = intval($priceFood)*intval($request->quantity[$i]);
            $orderDetail->save();
            $i++;
        }


        //Tru di so nguyen lieu sau khi order mon an
        foreach ($request->foodName as $index => $food)
        {
            //lay cong thuc cua cac mon an
            $recipe = Recipe::where('id_food','=',$food)->get();
            foreach ($recipe as $rp)
            {
                $i=0;
                //lay tung nguyen lieu de che bien mon an do ra trong bang materials = id_material
                $material= Material::where('id','=',$rp->id_material)->first();
                //lay so luong hien tai cua nguyen lieu do
                $currentQuantityOfMaterial = $material->quantity;
                //tinh so nguyen lieu con lai bang cach tru di so nguyen lieu trong cong thuc * so luong mon an
                $quantityOfMaterialAfterOrderFood = $currentQuantityOfMaterial - ($request->quantity[$i]*$rp->quantity);
                //gan so nguyen lieu con lai
                $material->quantity = $quantityOfMaterialAfterOrderFood;
                $material->save();
                $i++;
            }
        }
        $showOrderDetail = OrderDetail::where('id_order','=',$id_order)->get();
        $showOrder = Order::where('id','=',$id_order)->first();
        return view('admin.order.detail',['showOrderDetail'=>$showOrderDetail,'showOrder'=>$showOrder]);
    }

    public function getDetail($id)
    {
        $showOrderDetail = OrderDetail::where('id_order','=',$id)->get();
        $showOrder = Order::where('id','=',$id)->first();
        return view('admin.order.detail',['showOrderDetail'=>$showOrderDetail,'showOrder'=>$showOrder]);
    }

    public function postPayment(Request $request)
    {
        //Chuyen trang thai thanh da thanh toan
        $order = Order::find($request->idOrder);
        $order->is_payment = 1;
        $order->save();

        //Chuyen trang thai dat ban thanh 0
        $desk = Desk::where('id','=',$order->id_desk)->first();
        $desk->is_ordered = 0;
        $desk->save();

        //Luu thong tin hoa don vao bang revenue
            $revenue = new Revenue;
            $revenue->id_order = $request->idOrder;
            $revenue->id_restaurant = $request->idRestaurant;
            $revenue->id_user = $request->idUser;
            $revenue->total_revenue = $request->totalRevenue;
            $revenue->date = date('Y-m-d');
            $revenue->save();
    }
}
