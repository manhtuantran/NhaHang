@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
            <div class="col-md-12">
                <h1 align="center" style="margin: 3rem;">DANH SÁCH KHO HÀNG HỆ THỐNG</h1>
            </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên kho</th>
                <th scope="col">Tên nhà hàng</th>
                <th scope="col">Tùy chọn</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allContainer as $index => $ct)
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$ct->name}}</td>
                    <td>{{$ct->restaurant->name}}</td>
                    <td>
                        <a href="admin/container/sua/{{$ct->id}}"><span class="btn btn-warning">Sửa </span></a>
                        <a href="admin/container/xoa/{{$ct->id}}"><span class="btn btn-danger">Xóa </span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
