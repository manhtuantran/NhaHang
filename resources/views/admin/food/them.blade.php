@extends('admin/layout/index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Món ăn
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
                    <form action="admin/food/them" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên món ăn</label>
                            <input class="form-control" name="name" placeholder="Nhập vào tên món ăn"/>
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <input class="form-control" name="description" placeholder="Mô tả món ăn"/>
                        </div>

                        <div class="form-group">
                            <label>Giá tiền</label>
                            <input class="form-control" name="price" placeholder="Giá tiền "/>
                        </div>

                        <div class="form-group">
                            <label>Nhà hàng</label>
                            <select name="restaurant" id="">
                                @foreach($allRestaurant as $restaurant)
                                    <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                @endforeach
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
