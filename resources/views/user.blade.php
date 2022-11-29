@extends('template')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <a href="{{'akses/' .$user->id}}" class="btn btn-success">Ganti Role</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
