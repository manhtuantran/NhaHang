@extends('admin/layout/index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 align="center" style="margin: 3rem;">THÊM BÀN</h1>
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
                    <form action="admin/desk/them" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên bàn</label>
                            <input class="form-control" name="name" placeholder="Nhập vào tên bàn (VD: bàn số, vị trí, view,...)" />
                        </div>

                        <div class="form-group">
                            <label>Tên nhà hàng</label>
                            <select name="restaurant" id="">
                                @foreach($allRestaurant as $rs)
                                    <option value="{{$rs->id}}">{{$rs->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
