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
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                @if (Auth::user()->role == 'admin')
                <th>Status</th>
                @endif
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $posting)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$posting->judul}}</td>
                <td>{{$posting->isi}}</td>
                <td>{{$posting->tanggalDibuat}}</td>
                <td>{{$posting->kategori->namaKategori}}</td>
                @if (Auth::user()->role == 'admin')
                <td>{{$posting->status}}</td>
                @endif
                <td>
                    <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#edit{{$posting->id}}">
                        Edit
                    </button>
                    <a href="{{'delpos/' .$posting->id}}" class="btn btn-danger mb-2">Hapus</a>
                    @if (Auth::user()->role == 'admin')
                    <a href="{{'kelpos/' .$posting->id}}" class="btn btn-success">Kelola</a>
                    @endif
                </td>
            </tr>
            {{-- modal edit --}}
            <div class="modal fade" id="edit{{$posting->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Postingan</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('posting.update', $posting->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$posting->judul}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Isi</label>
                            <textarea name="isi" class="form-control" id="" cols="30" rows="10">{{$posting->isi}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Postingan</label>
                            <input type="date" class="form-control" name="tanggalDibuat" value="{{$posting->tanggalDibuat}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori</label>
                            <select name="kategori_id" id="" class="form-select">
                                @foreach ($kategori as $k)
                                <option value="{{$k->id}}" @if ($k->id == $posting->kategori_id) @selected($k->id == $posting->kategori_id) @endif>{{$k->namaKategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Petugas</label>
                            <input type="text" disabled class="form-control" value="{{Auth::user()->name}}">
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Postingan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Isi</label>
                <textarea name="isi" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggalDibuat">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Kategori</label>
                <select name="kategori_id" id="" class="form-select">
                    @foreach ($kategori as $k)
                    <option value="{{$k->id}}">{{$k->namaKategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Petugas</label>
                <input type="text" disabled class="form-control" value="{{Auth::user()->name}}">
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
