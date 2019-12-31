@extends('admin.layout.index')

@section('content')

    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif

    <div class="col-md-12">
        <h1 align="center" style="margin-bottom: 3rem;">CHI TIẾT ORDER</h1>
    </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nhân viên Order</th>
                <th scope="col">Bàn</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái lên đơn</th>
                <th scope="col">Trạng thái thanh toán</th>
            </tr>
            </thead>
            <tbody>
            <tr class="form-group">
                <th scope="row">
                    1
                    <input type="hidden" value="{{$showOrder->id}}" id="idOrder">
                </th>
                <td>
                    <input class="form-control" type="text" name="order_user" value="{{$showOrder->user->name}}"
                           disabled>
                </td>
                <td>
                    <input class="form-control" type="text" name="deskName" value="{{$showOrder->desk->name}}" disabled>
                </td>
                <td>
                    <input class="form-control" type="text" name="customer_name" value="{{$showOrder->customer_name}}"
                           disabled>
                </td>
                <td>
                    <input class="form-control" type="text" name="phone_number" value="{{$showOrder->phone_number}}"
                           disabled>
                </td>
                <td>
                    <input class="form-control" type="text" name="address" value="{{$showOrder->address}}" disabled>
                </td>
                <td>
                    <h3>@if($showOrder->is_ordered==1)<i style="color: blue">Đã lên đơn</i>@endif</h3>
                </td>
                <td>
                    <h3>@if($showOrder->is_payment==1)<i style="color: darkblue">Đã thanh toán</i>@else<i
                            style="color: darkred">Chưa thanh toán</i>@endif</h3>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên món ăn</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0 @endphp
            @foreach($showOrderDetail as $index => $odt)
                <tr class="form-group">
                    <th scope="row">{{$index}}</th>
                    <td>
                        <input class="form-control" type="text" name="customer_name" value="{{$odt->food->name}}"
                               disabled>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="phone_number" value="{{$odt->quantity}}" disabled>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="price"
                               value="{{number_format($odt->food->price,0,'','.')}} đ"
                               disabled>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="totalPrice"
                               value="{{number_format($odt->total_amount,0,'','.')}} đ" disabled>
                    </td>
                </tr>
                @php $total += $odt->total_amount @endphp
            @endforeach
            </tbody>
        </table>

        <div>
            <h2><i>Tổng tiền: {{number_format($total,0,'','.')}} đ</i></h2>
        </div>

        <input type="hidden" id="totalRevenue" value="{{$total}}">
        <input type="hidden" id="idRestaurant" value="{{$showOrder->user->restaurant->id}}">
        <input type="hidden" id="idUser" value="{{$showOrder->id_user}}">

        @if(isset($showOrder->is_payment) && $showOrder->is_payment==0)
            <div>
                <button type="button" class="btn btn-primary" id="payment-order-detail">Thanh toán</button>
            </div>
        @endif
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#payment-order-detail').click(function () {
                var idOrder = $('#idOrder').val();
                var idUser = $('#idUser').val();
                var idRestaurant = $('#idRestaurant').val();
                var totalRevenue = $('#totalRevenue').val();

                $.ajax({
                    url: "{{route('payment-order-detail')}}",
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        idOrder: idOrder,
                        idUser: idUser,
                        idRestaurant: idRestaurant,
                        totalRevenue: totalRevenue,
                        _token: '{{csrf_token()}}'
                    }
                }).done(function (data) {
                    location.assign('admin/order/danhsach');
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ': ' + errorThrown);
                });
            });
        });
    </script>
@endsection
