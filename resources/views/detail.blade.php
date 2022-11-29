@extends('template')
@section('content')
    <a href="/" class="btn btn-secondary">Kembali</a>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title">{{ $posting->judul }}</h5>
                    <p>by {{ $posting->user->name }}</p>
                    <p class="text-secondary">{{ $posting->tanggalDibuat }}</p>
                    <p class="card-text">{{ $posting->isi }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        @if ($produk->isEmpty())
        @else
        <h6 class="text-center mb-3">Rekomendasi produk untuk Anda</h6>
        <div class="row justify-content-center">
            @foreach ($produk as $item)
            <div class="col-3">
                <div class="card text-center mb-5">
                    <img src="{{asset('storage/' .$item->foto)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->namaProduk }}</h5>
                        <p>{{$item->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
