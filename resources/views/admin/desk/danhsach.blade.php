@extends('admin.layout.index')

@section('content')
    <div class="col-md-10">
        <table class="table">
            <thead>
            <tr align="center">
                <th scope="col"><h1></h1></th>
                <th scope="col"><h1>Nhà hàng</h1></th>
                <th scope="col"><h1>Đặt bàn\Thanh toán</h1></th>
                @if(Auth::user()->level=='admin')
                    <th scope="col"><h1>Tùy chọn</h1></th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($allDesk as $desk)
                <tr align="center">
                    <td><img src="images/ban.jpeg" alt="" width="300px"></td>
                    <td>
                        <span><h3><b><i>{{$desk->restaurant->name}}</i></b></h3></span>
                    </td>
                    <td>
                        <input type="hidden" class="order" value="{{$desk->id}}">
                        <p>
                            <input type="text" class="form-control" name="name" value="{{$desk->name}}" disabled>
                        </p>
                        <p><span>@if($desk->is_ordered==1) <i class="alert alert-success">Bàn đã được đặt</i> @else
                                        <i id="is-order" class="alert alert-warning">Bàn chưa có người đặt</i> @endif</span></p>
{{--                        @if($desk->is_ordered==0)--}}
{{--                            <button type="button" class="btn btn-primary order-table" style="margin-right:.5rem;">Đặt bàn</button>--}}
{{--                        @else--}}
{{--                            <button type="button" class="btn btn-success payment-table">Thanh toán</button>--}}
{{--                        @endif--}}
                    </td>
                    @if(Auth::user()->level=='admin')
                        <td>
                            <a href="admin/desk/sua/{{$desk->id}}"><span class="btn btn-warning">Sửa</span></a>
                            <a href="admin/desk/xoa/{{$desk->id}}">
                                <span class="btn btn-danger"
                                      onclick="return confirm('Bạn có chắc muốn xóa bàn này không?')">Xóa</span>
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
            @if(Auth::user()->level=='admin')
                {{$allDesk->links()}}
            @endif
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.order-table').click(function () {
                var parentOfIdTable = $(this).closest('tr');
                var idTable = $('.order', parentOfIdTable).val();
                $.ajax({
                    url: "{{route('order')}}",
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        idTable: idTable,
                        _token: '{{csrf_token()}}'
                    },
                }).done(function (data) {
                    location.reload();
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ': ' + errorThrown);
                });
            });

            $('.payment-table').click(function () {
                var parentOfIdTable = $(this).closest('tr');
                var idTable = $('.order', parentOfIdTable).val();
                $.ajax({
                    url: "{{route('payment-desk')}}",
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        idTable: idTable,
                        _token: '{{csrf_token()}}'
                    }
                }).done(function (data) {
                    location.reload();
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ': ' + errorThrown);
                });
            });
        })
    </script>
@endsection
