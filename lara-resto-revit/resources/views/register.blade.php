@extends('front')

@section('content')

    <div>
        <div class="col-6">
            <form action="{{ url('/postregister') }}" method="POST">
                @csrf
                <div>
                    <label class="form-label" for="">Pelanggan</label>
                    <input class="form-control" value="{{ old('pelanggan') }}" type="text" name="pelanggan" id="">
                    <span class="text-danger">
                        @error('pelanggan')
                            {{$message  }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label class="form-label" for="">Alamat</label>
                    <input class="form-control" type="text "value="{{ old('alamat') }}"  name="alamat" id="">
                    <span class="text-danger">
                        @error('alamat')
                            {{$message  }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label class="form-label" for="">Telepon</label>
                    <input class="form-control" type="text" value="{{ old('telepon') }}"  name="telepon" id="">
                    <span class="text-danger">
                        @error('telepon')
                            {{$message  }}
                        @enderror
                    </span>
                <div>
                    <label class="form-label"  for="">Jenis Kelamin</label>
                    <select class="form-select" type="select"   name="jeniskelamin" id="">
                    <option value="l">L</option>
                    <option value="p" selected>P</option>
                    </select>
                    <span class="text-danger">
                        @error('jenis kelamin')
                            {{$message  }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label class="form-label" for="">Email</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" id="">
                    <span class="text-danger">
                        @error('email')
                            {{$message  }}
                        @enderror
                    </span>
                </div>
                <div>
                    <label class="form-label" for="">Password</label>
                    <input class="form-control" type="text" name="password" id="">
                    <span class="text-danger">
                        @error('password')
                            {{$message  }}
                        @enderror
                    </span>
                </div>
                <div class="mt-4">
                    <input type="submit" name="submit" value="submit"  id="">
                </div>




            </form>
        </div>
    </div>


@endsection
