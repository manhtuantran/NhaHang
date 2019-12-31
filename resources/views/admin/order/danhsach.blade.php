@php use Illuminate\Support\Facades\Auth @endphp
@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="col-md-12">
            <h1 align="center" style="margin: 3rem;">DANH SÁCH ORDER</h1>
        </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nhân viên thu ngân</th>
                <th scope="col">Bàn</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Tùy chọn</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($allOrder as $index => $od)
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$od->user->name}}</td>
                    <td>{{$od->desk->name}}</td>
                    <td>{{$od->customer_name}}</td>
                    <td>{{$od->phone_number}}</td>
                    <td>{{$od->address}}</td>
                    <td>{{$od->created_at}}</td>
                    <td>
                        <a href="admin/order/detail/{{$od->id}}"><span class="btn btn-primary">Chi tiết </span></a>
                        @if(Auth::user()->level=='admin')
                            <a href="admin/order/sua/{{$od->id}}"><span class="btn btn-warning">Sửa </span></a>
                            <a href="admin/order/xoa/{{$od->id}}"><span class="btn btn-danger">Xóa </span></a>
                        @endif
                    </td>
                    <td>
                        <h6>@if($od->is_payment==1)<i style="color: darkblue">Đã thanh toán</i>@else<i
                                style="color: darkred">Chưa thanh toán</i>@endif</h6>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$allOrder->links()}}
    </div>

@endsection
