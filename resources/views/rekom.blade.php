@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('rekomendasi')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Keluhan</label>
                            <select name="keluhan" class="form-select" id="">
                                <option selected disabled>Pilih keluhan Anda</option>
                                <option value="keseleo dan kurang nafsu makan">Keseleo, Kurang nafsu makan</option>
                                <option value="pegal-pegal">Pegal-pegal</option>
                                <option value="darah tinggi dan gula darah">Darah tinggi, Gula darah</option>
                                <option value="kram perut dan masuk angin">Kram perut, Masuk angin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tahun Lahir</label>
                            <select name="tahun" class="form-select" id="">
                                <option selected disabled>Pilih Tahun Lahir</option>
                                @for ($i = 1900; $i <= date("Y"); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Cek</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rekomendasi Jamu</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                            <tr>
                                <th>Nama Jamu</th>
                                <td>{{$data['nama']}}</td>
                            </tr>
                            <tr>
                                <th>Khasiat</th>
                                <td>{{$data['khasiat']}}</td>
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <td>{{$data['keluhan']}}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>{{$data['umur']}}</td>
                            </tr>
                            <tr>
                                <th>Saran Penggunaan</th>
                                <td>{{$data['saran'] . ', ' . $data['saran2']}}</td>
                            </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection