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
            <h1 align="center" style="margin: 3rem;">DANH SÁCH NHÂN VIÊN</h1>
        </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Nhà hàng</th>
                <th scope="col">Tùy chọn</th>
                <th scope="col">Khóa/Mở khóa tài khoản</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allUser as $index => $user)
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->level}}</td>
                    <td>
                        @if($user->restaurant==NULL)Quản lý tất cả nhà hàng
                        @else{{$user->restaurant->name}}
                        @endif
                    </td>
                    @if(Auth::user()->level=='admin')
                        <td>
                            <a href="admin/user/sua/{{$user->id}}" class="btn btn-warning"><span>Sửa </span></a>
                            @if($user->level!=='admin')
                                <a href="admin/user/xoa/{{$user->id}}" class="btn btn-danger"><span>Xóa </span></a>
                                <a href="admin/user/sua/{{$user->id}}" class="btn btn-success"><span>Thăng chức </span></a>
                            @endif
                        </td>
                    @else
                        <td></td>
                    @endif

                    @if(Auth::user()->level=='admin' || Auth::user()->level=='Quản lý')
                        <td>
                            @if($user->is_locked==1)
                                <a href="admin/user/mokhoa/{{$user->id}}"><span
                                        class="btn btn-success">Mở khóa tài khoản</span></a>
                            @else
                                <a href="admin/user/khoa/{{$user->id}}"><span
                                        class="btn btn-danger">Khóa tài khoản</span></a>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
