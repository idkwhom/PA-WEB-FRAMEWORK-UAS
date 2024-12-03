@extends('layouts.layouts')
@section('content')
    <!-- Formulir Daftar UKM -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Tambah UKM baru</h1>
        <form action="{{route('ukm.update', $ukm->id)}}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="mb-3">
                <label for="nama_ukm" class="form-label">Nama UKM:</label>
                <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" placeholder="Masukkan nama UKM" required value="{{$ukm->nama_ukm}}">
            </div>
            <div class="mb-3">
                <label for="tujuan_ukm" class="form-label">Tujuan UKM</label>
                <input type="text" class="form-control" id="tujuan_ukm" name="tujuan_ukm" placeholder="Masukkan tujuan UKM" required value="{{$ukm->tujuan_ukm}}">
            </div>
            <div class="mb-3">
                <label for="kegiatan_ukm" class="form-label">Kegiatan UKM:</label>
                <input type="text" class="form-control" id="kegiatan_ukm" name="kegiatan_ukm" placeholder="Masukkan kegiatan UKM" required value="{{$ukm->kegiatan_ukm}}">
            </div>
            <div class="form-group">
                <label for="sertifikat">Foto UKM</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
                 <small class="form-text text-muted">Masukkan foto UKM</small>
                 @if(isset($ukm->file_name))
                 <img class="my-3 img-fluid" src="{{$ukm->file_path.$ukm->file_name}}" alt="">
                 @endif
            </div>
            {{-- <div class="mb-3">
                <label for="ukm" class="form-label">List UKM yang Ingin Dimasuki:</label>
                <select class="form-select" id="ukm" name="ukm" required>
                    <option value="" disabled selected>Pilih UKM</option>
                    <option value="Badminton">Badminton</option>
                    <option value="E-Sport">E-Sport</option>
                    <option value="Catur">Catur</option>
                    <option value="Basket">Basket</option>
                    <option value="Futsal">Futsal</option>
                    <option value="Band">Band</option>
                    <option value="Debat">Debat</option>
                </select>
            </div> --}}
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

@endsection