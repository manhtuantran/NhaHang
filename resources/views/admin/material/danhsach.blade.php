@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
            <div class="col-md-12">
                <h1 align="center" style="margin: 3rem;">DANH SÁCH NGUYÊN LIỆU</h1>
            </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên nguyên liệu</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Kho lưu trữ</th>
                <th scope="col">Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allMaterial as $index => $mt)
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$mt->name}}</td>
                    <td>{{$mt->quantity}}</td>
                    @if(\Illuminate\Support\Facades\Auth::user()->level=='admin')
                        <td>{{$mt->container->name}}</td>
                    @else
                        <td>{{$container->name}}</td>
                    @endif
                    <td>
                        <a href="admin/material/sua/{{$mt->id}}"><span class="btn btn-warning">Sửa </span></a>
                        @if(\Illuminate\Support\Facades\Auth::user()->level=='admin')
                            <a href="admin/material/xoa/{{$mt->id}}"><span class="btn btn-danger">Xóa </span></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
