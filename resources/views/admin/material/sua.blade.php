@extends('admin/layout/index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 align="center" style="margin: 3rem;">NGUYÊN LIỆU</h1>
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
                    <form action="admin/material/sua/{{$materialDetail->id}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tên nguyên liệu</label>
                            <input class="form-control" name="name" value="{{$materialDetail->name}}"
                                   placeholder="Nhập vào tên nguyên liệu"/>
                        </div>

                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" name="quantity" value="{{$materialDetail->quantity}}"
                                   placeholder="Nhập vào số lượng"/>
                        </div>

                        <div class="form-group">
                            <label>Kho lưu</label>
                            <select name="container" id="">
                                @if(\Illuminate\Support\Facades\Auth::user()->level=='admin')
                                    @foreach($allContainer as $ct)
                                        <option value="{{$ct->id}}" @if($ct->id==$materialDetail->id_container)
                                        selected @endif>{{$ct->name}}</option>
                                    @endforeach
                                @else
                                    <option value="{{$container->id}}" selected>{{$container->name}}</option>
                                @endif
                            </select>
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
