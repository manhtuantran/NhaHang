@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="col-md-12">
            <h1 align="center" style="margin: 3rem;">CÔNG THỨC: {{$food->name}}</h1>
        </div>
        <div class="col-md-12">
            <form action="admin/recipe/sua/{{$food->id}}" method="post">
                {{csrf_field()}}
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên nguyên liệu</th>
                        <th scope="col">Số lượng</th>
                    </tr>
                    </thead>
                    <tbody id="material-list">
                    @foreach($recipe as $index => $rp)
                        <tr>
                            <th scope="row">{{$index}}</th>
                            <td>
                                <select name="name[]" id="">
                                    @foreach($allMaterial as $mt)
                                        <option value="{{$mt->id}}"
                                                @if($mt->id==$rp->material->id) selected @endif>{{$mt->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" name="quantity[]" value="{{$rp->quantity}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="col-md-12" style="margin-bottom: .5rem;">
                    <button type="button" class="btn btn-warning btn-add-recipe">Thêm nguyên liệu</button>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.btn-add-recipe').click(function () {
            $('#material-list').append(
                '<tr><th></th><td><select name="name[]" id="">@foreach($allMaterial as $mt)<option value="{{$mt->id}}">{{$mt->name}}</option>@endforeach</select></td><td><input type="text" name="quantity[]"></td></tr>'
            );
        });
    </script>
@endsection
