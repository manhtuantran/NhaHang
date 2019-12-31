@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
            <div class="col-md-12">
                <h1 align="center" style="margin: 3rem;">DANH SÁCH NHÀ HÀNG</h1>
            </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên nhà hàng</th>
                <th scope="col">Địa điểm</th>
                <th scope="col">Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allRestaurant as $index => $rs)
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$rs->name}}</td>
                    <td>{{$rs->location}}</td>
                    <td>
                        <a href="admin/restaurant/sua/{{$rs->id}}"><span class="btn btn-warning">Sửa </span></a>
                        <a href="admin/restaurant/xoa/{{$rs->id}}"><span class="btn btn-danger">Xóa </span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
