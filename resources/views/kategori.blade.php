@extends('template')
@section('content')
<div class="container">
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#add">
        Tambah +
      </button>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $kategori)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kategori->namaKategori}}</td>
                <td>{{$kategori->descKategori}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$kategori->id}}">
                        Edit
                    </button>
                    <a href="{{'delkat/' .$kategori->id}}" class="btn btn-danger">Hapus</a>               
                </td>
            </tr>
            {{-- modal edit --}}
            <div class="modal fade" id="edit{{$kategori->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Kategori</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('kategori.update', $kategori->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="namaKategori" value="{{$kategori->namaKategori}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea name="descKategori" class="form-control" id="" cols="30" rows="10">{{$kategori->descKategori}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
            
            @endforeach
        </tbody>
    </table>
</div>

{{-- modal add --}}
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="namaKategori">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Deskripsi</label>
                <textarea name="descKategori" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
