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
                <th>Nama Produk</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                @if (Auth::user()->role == 'admin')
                <th>Status</th>
                @endif
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $produk)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$produk->namaProduk}}</td>
                <td><img src="{{asset('storage/' .$produk->foto)}}" width="100px" alt="" srcset=""></td>
                <td>{{$produk->harga}}</td>
                <td>{{$produk->descProduk}}</td>
                <td>{{$produk->kategori->namaKategori}}</td>
                @if (Auth::user()->role == 'admin')
                <td>{{$produk->status}}</td>
                @endif
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$produk->id}}">
                        Edit
                    </button>
                    <a href="{{'delpro/' .$produk->id}}" class="btn btn-danger">Hapus</a>
                    @if (Auth::user()->role == 'admin')
                    <a href="{{'kelpro/' .$produk->id}}" class="btn btn-success">Kelola</a>
                    @endif
                </td>
            </tr>
            {{-- modal edit --}}
            <div class="modal fade" id="edit{{$produk->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Produk</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('produk.update', $produk->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="namaProduk" value="{{$produk->namaProduk}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" name="foto" value="{{$produk->namaproduk}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" name="harga" value="{{$produk->harga}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea name="descProduk" class="form-control" id="" cols="30" rows="10">{{$produk->descProduk}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori</label>
                            <select name="kategori_id" id="" class="form-select">
                                @foreach ($kategori as $k)
                                <option value="{{$k->id}}" @if ($k->id == $produk->kategori_id) @selected($k->id == $produk->kategori_id) @endif>{{$k->namaKategori}}</option>
                                @endforeach
                            </select>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="namaProduk">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Foto Produk</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Harga Produk</label>
                <input type="number" class="form-control" name="harga">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Deskripsi</label>
                <textarea name="descProduk" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Kategori</label>
                <select name="kategori_id" id="" class="form-select">
                    @foreach ($kategori as $k)
                    <option value="{{$k->id}}">{{$k->namaKategori}}</option>
                    @endforeach
                </select>
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
