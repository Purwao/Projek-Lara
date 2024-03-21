<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resto Laravel</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.1-dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div>
            <nav class="navbar navbar-expand-lg bg-body-tertiary mt-0">
                <div class="container-fluid">
                    <a href="/"><img src="{{asset('Eunoia.png')}}"  width="200"></a>
                    <ul class="navbar-nav gap-5">

                        @if (session()->has('cart'))
                            <li class="nav-item"><a href="{{url('cart')}}">Cart(
                                @php
                                    $count= count(session('cart'));
                                    echo $count;
                                @endphp
                            )</a></li>
                        @else
                             <li class="nav-item">Cart</li>
                        @endif


                            @if (session()->missing('idpelanggan'))
                                <li class="nav-item"><a href="{{ url('/register') }}">Register</a></li>
                                <li class="nav-item"><a href="/login">Login</a></li>
                            @endif

                            @if (session()->has('idpelanggan'))
                                <li class="nav-item">@if (session()->has('idpelanggan'))
                                 {{ session ('idpelanggan')['email'] }}
                                 @endif</li>
                                <li class="nav-item"><a href="/logout">Logout</a></li>
                            @endif
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row mt-5">
            <div class="col-2">
                <ul class="list-group">
                    @foreach ($kategoris as $kategori)
                        <li class="list-group-item"><a href="{{ url('show/'.$kategori->idkategori) }}">{{ $kategori -> kategori }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-10 mt-0">
                 @yield('content')
            </div>
        </div>
        <div class="bg-primary text-white mt-5">
            <p class="text-center">github.com/Purwao</p>
        </div>
    </div>

    <script src="{{asset('bootstrap-5.3.1-dist/js/bootstrap.min.js')}}"></script>
</body>
</html>
