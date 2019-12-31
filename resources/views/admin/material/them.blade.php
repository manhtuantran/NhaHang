@extends('admin/layout/index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nguyên liệu
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
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
                    <form action="admin/material/them" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên nguyên liệu</label>
                            <input class="form-control" name="name" placeholder="Nhập vào tên nguyên liệu"/>
                        </div>

                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" name="quantity" placeholder="Nhập vào số lượng"/>
                        </div>

                        <div class="form-group">
                            <label>Kho lưu</label>
                            <select name="container" id="">
                                @if(\Illuminate\Support\Facades\Auth::user()->level=='admin')
                                    @foreach($allContainer as $ct)
                                        <option value="{{$ct->id}}">{{$ct->name}}</option>
                                    @endforeach
                                @else
                                    <option value="{{$container->id}}" selected>{{$container->name}}</option>
                                @endif
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
