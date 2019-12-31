@extends('admin.layout.index')

@section('content')
    <div class="row">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="col-md-12">
            <h1 align="center" style="margin: 3rem;">DOANH THU NĂM NAY ({{date('Y')}})</h1>
        </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ngày</th>
                <th scope="col">Nhà hàng</th>
                <th scope="col">Nhân viên order</th>
                <th scope="col">Doanh thu</th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0;  @endphp
            @foreach($yearRevenue as $index => $revenue)
                @php $total += $revenue->total_revenue;  @endphp
                <tr>
                    <th scope="row">{{$index}}</th>
                    <td>{{$revenue->created_at->format('d-m-Y')}}</td>
                    <td>{{$revenue->restaurant->name}}</td>
                    <td>{{$revenue->user->name}}</td>
                    <td>{{number_format($revenue->total_revenue,0,'','.')}} đ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <div>
                {{$yearRevenue->links()}}
            </div>
        <h1><i>Tổng doanh thu: {{number_format($total,0,'','.')}} đ</i></h1>
    </div>
@endsection
