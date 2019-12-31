@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="col-md-12">
            <h1 align="center" style="margin: 3rem;">DOANH THU THEO NHÂN VIÊN ORDER</h1>
        </div>
        <div class="col-md-12">
            <h3>Chọn nhân viên</h3>
            <select name="name" id="selectOrderUser">
                <option value="chuachon" selected>Chưa chọn</option>
                @foreach($orderUser as $user)
                    <option id="idUser" value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

        </div>
        <div class="col-md-12">
            <table class='table'>
                <thead class='thead-light'>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Ngày</th>
                    <th scope='col'>Nhà hàng</th>
                    <th scope='col'>Doanh thu</th>
                </tr>
                </thead>
                <tbody id="filterOrderRevenue">

                </tbody>
            </table>
{{--            <h2><i id="totalRevenue">Tổng doanh thu: </i></h2>--}}
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#selectOrderUser').change(function () {
                var idUser = $('#selectOrderUser').val();
                $.ajax({
                    url: "{{route('filter-revenue-order-user')}}",
                    type: 'POST',
                    data: {
                        idUser: idUser,
                        _token: '{{csrf_token()}}'
                    },
                    dataType:'json'
                }).done(function (data) {
                    console.log(data);
                    function formatNumber(num) {
                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                    }
                    var output = '';
                    var total = 0;
                    for(var count = 0; count < data.length; count++)
                    {
                        total += parseFloat(data[count].total_revenue);
                        output += '<tr>';
                        output += '<td>' + count + '</td>';
                        output += '<td>' + data[count].date + '</td>';
                        output += '<td>' + data[count].name +'</td>';
                        output += '<td>' + formatNumber(data[count].total_revenue) + ' đ'  + '</td></tr>';
                    }
                    $('#filterOrderRevenue').html(output);
                    // $('#totalRevenue').append(formatNumber(total));
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ': ' + errorThrown);
                });
            });
        });
    </script>
@endsection
