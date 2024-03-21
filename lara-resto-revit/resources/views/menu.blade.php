
@extends('front')

@section('content')
    <div class="row">
        @foreach ($menus as $menu)
            <div class="col-md-4 ">
                <div class="card mb-5 ">
                    <img src="{{ asset('gambar/'.$menu->gambar) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->menu }}</h5>
                        <p class="card-text">{{ $menu->deskripsi }}</p>
                        <h5 class="card-title">Rp {{ $menu->harga }}</h5>
                        <a href="{{url("beli/".$menu->idmenu)}}" class="btn btn-primary">Beli</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $menus->links() }}
        </div>
    </div>
@endsection

