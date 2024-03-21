@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Detail Order Milik: <span class="text-primary">{{ $orders[0] ['pelanggan']}}</span></h1>
        <h2>Total : <span class="text-primary">{{ number_format($orders[0]['total'])}}</span></h2>
        <h4>id Pembelian : <span class="text-primary">{{ $orders[0] ['idorder' ] }}</span> </h4>
    </div>
    <div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$order -> menu}}</td>
                        <td>{{$order -> harga}}</td>
                        <td>{{$order -> jumlah}}</td>
                        <td>{{$order -> jumlah * $order -> harga}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
