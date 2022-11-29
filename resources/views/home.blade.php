@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($data as $posting)
        <div class="col-4">
            <div class="card mb-4">
                    <div class="card-body">
                    <h5 class="card-title">{{$posting->judul}}</h5>
                    <p>by {{$posting->user->name}}</p>
                    <p class="text-secondary">{{$posting->tanggalDibuat}}</p>
                    <p class="card-text">{{Str::limit($posting->isi, 150)}} <a href="{{'detail/' .$posting->id}}">Read More</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$data->links()}}
</div>
<footer>
    <div class="container mt-5 mb-2 text-center">
        <p class="text-secondary">Copyright Wes Makmur @ 2022</p>
    </div>
</footer>
@endsection
