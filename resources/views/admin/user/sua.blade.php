@php use Illuminate\Support\Facades\Auth; @endphp
@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 align="center" style="margin: 3rem;">SỬA THÔNG TIN NHÂN VIÊN</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/user/sua/{{$user->id}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" value="{{$user->username}}"
                                   placeholder="Nhập vào Username" readonly/>
                        </div>

                        <div class="form-group">
                            <label>Họ Tên</label>
                            <input class="form-control" name="name" value="{{$user->name}}"
                                   placeholder="Nhập vào tên của bạn"/>
                        </div>

                        <div class="form-group">
                            <input id="changePassword" type="checkbox" name="changePassword">
                            <label>Đổi Mật khẩu</label>
                            <input class="form-control password" type="password" name="password"
                                   placeholder="Nhập vào mật khẩu" disabled/>
                        </div>

                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input class="form-control password" type="password" name="passwordAgain"
                                   placeholder="Nhập lại mật khẩu" disabled/>
                        </div>


                        <div class="form-group">
                            <label>Quyền người dùng</label>
                            @if(Auth::user()->level=='admin')
                                <label class="radio-inline">
                                    <input name="level" value="admin" type="radio"
                                           @if($user->level=='admin')
                                           {{"checked"}}
                                           @endif
                                           checked="">Admin
                                </label>
                            @endif
                            <label class="radio-inline">
                                <input name="level" value="Quản lý" type="radio"
                                @if($user->level=='Quản lý')
                                    {{"checked"}}
                                    @endif
                                >Quản Lý
                            </label>

                            <label class="radio-inline">
                                <input name="level" value="Thu ngân" type="radio"
                                @if($user->level=='Thu ngân')
                                    {{"checked"}}
                                    @endif
                                >Thu ngân
                            </label>

                            <label class="radio-inline">
                                <input name="level" value="Order" type="radio"
                                @if($user->level=='Order')
                                    {{"checked"}}
                                    @endif
                                >Order
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection

