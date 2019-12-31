@extends('admin/layout/index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Món ăn {{$food->name}}
                        <small>Tạo công thức</small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <!-- /.col-lg-12 -->
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
                <div class="col-lg-12">
                    <form action="admin/recipe/them/{{$food->id}}" method="POST">
                        {{csrf_field()}}
                        <table class="table">
                            <thead>
                            <tr style="text-align: center">
                                <th scope="col">Tên nguyên liệu</th>
                                <th scope="col">Số lượng</th>
                            </tr>
                            </thead>
                            <tbody id="add-material">
                            <tr>
                                <td align="center">
                                    <select name="name[]">
                                        @foreach($allMaterial as $mt)
                                            <option value="{{$mt->id}}">{{$mt->name}}</option>
                                            @endforeach
                                    </select>
                                </td>
                                <td><input class="form-control" name="quantity[]" type="text"></td>
                            </tr>
                            </tbody>
                        </table>


                            <div class="form-group col-md-11 text-right" id="criterion_unit_table">
                                <button type="button" class="btn btn-default btn-add-material" id="insert_criterion_unit">Thêm nguyên liệu</button>
                            </div>
                        <button type="submit" class="btn btn-default">Tạo công thức</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
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
            $('.btn-add-material').click(function () {
                $('#add-material').append(
                    '<tr><td align="center"><select name="name[]">@foreach($allMaterial as $mt)<option value="{{$mt->id}}">{{$mt->name}}</option>@endforeach</select></td><td><input class="form-control" name="quantity[]" type="text"></td></tr>')
            });
        });
    </script>
@endsection
