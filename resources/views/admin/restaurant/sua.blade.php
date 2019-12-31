@extends('admin/layout/index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thông tin Nhà hàng
                        <small>Sửa</small>
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
                    <form action="admin/restaurant/sua/{{$restaurantDetail->id}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên nhà hàng</label>
                            <input class="form-control" name="name" value="{{$restaurantDetail->name}}" placeholder="Nhập vào tên nhà hàng" />
                        </div>

                        <div class="form-group">
                            <label>Địa điểm</label>
                            <input class="form-control" type="text" name="location" value="{{$restaurantDetail->location}}" placeholder="Nhập vào Địa điểm nhà hàng" />
                        </div>

                        <button type="submit" class="btn btn-default">Sửa</button>
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
