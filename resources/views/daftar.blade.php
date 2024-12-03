@extends('layouts.layouts')
@section('content')

    <!-- Formulir Daftar UKM -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Profil</h1>
        <form action="{{route('user.update', $user->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="name" name="nama" placeholder="Masukkan nama lengkap" required value="{{$user->nama}}">
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required value="{{$user->nim}}">
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas:</label>
                <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Masukkan fakultas" required value="{{$user->fakultas}}">
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Program Studi:</label>
                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan program studi" required value="{{$user->prodi}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">No HP:</label>
                <input type="text" class="form-control" id="contact" name="no_hp" placeholder="Masukkan email atau no HP" required value="{{$user->no_hp}}">
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
