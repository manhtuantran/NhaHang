@php use Illuminate\Support\Facades\Auth; @endphp
@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
            <div class="col-md-12">
                <h1 align="center" style="margin: 3rem;">MENU ĐỒ ĂN</h1>
            </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nhà hàng</th>
                <th scope="col">Tên món ăn</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Tùy chọn</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($allFood as $index => $fd)
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$fd->restaurant->name}}</td>
                    <td>{{$fd->name}}</td>
                    <td>{{$fd->description}}</td>
                    <td>{{number_format($fd->price,0,'','.')}} đ</td>
                    @if(Auth::user()->level=='admin' || Auth::user()->level == 'Quản lý')
                    <td>
                        <a href="admin/food/sua/{{$fd->id}}"><span class="btn btn-warning">Sửa </span></a>
                        <a href="admin/food/xoa/{{$fd->id}}"><span class="btn btn-danger">Xóa </span></a>
                    </td>
                    <td>
                        @php
                            $idFood = $fd->id;
                            $rp1 = Illuminate\Support\Facades\DB::table('recipe')->select('*')->join('foods','recipe.id_food','=','foods.id')->where('foods.id','=',$idFood)->get();
                            $rp2 = $rp1->toArray();
                        @endphp
                        @if(empty($rp2))

                            <a href="admin/recipe/them/{{$fd->id}}">
                                <span class="btn btn-primary"> Tạo công thức</span>
                            </a>

                        @else

                            <a href="admin/recipe/congthuc/{{$fd->id}}">
                                <span class="btn btn-success"> Xem công thức</span>
                            </a>
                        @endif
                    </td>
                        @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
