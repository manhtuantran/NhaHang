@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="col-md-12">
            <h1 align="center" style="margin: 3rem;">TẠO ORDER</h1>
        </div>
        <div class="col-md-12">
            <form action="admin/order/tao" method="POST">
                {{csrf_field()}}
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="form-group">
                        <td>
                            <input class="form-control" type="text" name="customer_name">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="phone_number">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="address">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead>
                    <tr align="center">
                        <th scope="col">
                            <h1>Bàn</h1>
                            <p><span>(Chỉ có thể chọn bàn chưa có người đặt)</span></p>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="form-group" align="center">
                        <td>
                            <select name="idDesk" id="">
                                @foreach($allDeskAreNotOrdered as $desk)
                                    <option value="{{$desk->id}}">{{$desk->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead>
                    <tr align="center">
                        <th scope="col">Tên món</th>
                        <th scope="col">Số lượng</th>
                    </tr>
                    </thead>
                    <tbody id="add-food">
                    <tr align="center">
                        <td>
                            <select name="foodName[]" id="">
                                @foreach($allFood as $food)
                                    <option value="{{$food->id}}">{{$food->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="quantity[]">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group col-md-12 text-right" id="criterion_unit_table">
                    <button type="button" class="btn btn-warning" id="btn-order-food">Gọi thêm món</button>
                </div>
                @if(empty($allDeskAreNotOrdered->toArray()))
                    <h1><i>Đang hết bàn, không thể tạo order!</i></h1>
                    @else
                    <button type="submit" class="btn btn-primary">Lên Order</button>
                @endif
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#btn-order-food').click(function () {
                $('#add-food').append('<tr align="center"><td><select name="foodName[]" id="">@foreach($allFood as $food)<option value="{{$food->id}}">{{$food->name}}</option>@endforeach</select></td><td><input class="form-control" type="text" name="quantity[]"></td></tr>');
            });
        });
    </script>
@endsection
