@extends('layouts.layouts')
@section('content')

    <!-- Content -->
    <div class="container my-5">
        <div class="row text-center justify-content-center">
            <h1 class="mb-4">Welcome to UKM UNMUL Dashboard</h1>
            <p class="lead">UKM adalah lembaga kemahasiswaan yang menjadi wadah bagi mahasiswa yang memiliki kesamaan minat, kegemaran, dan kreativitas.</p>
            @role('admin')
                <a href="{{route('ukm.create')}}" class="col-md-2 text-center btn btn-primary">Tambah UKM</a>
            @endrole
        </div>


        <div class="row my-4">
            @foreach ($ukms as $ukm)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{$ukm->file_path?$ukm->file_path.$ukm->file_name:"https://via.placeholder.com/300x200"}}" class="card-img-top" alt="UKM Image 1">
                    <div class="card-body">
                        <p class="card-text">Nama UKM: {{$ukm->nama_ukm}}</p>
                        @role('user')
                        @if($ukm->cek_daftar(Auth::user()->id))
                            <p>Sedang menunggu persetujuan</p>
                        @else
                        <form action="/daftar/{{$ukm->id}}" method="post">
                            @csrf
                            <button class="btn btn-primary">Daftar</button>
                        </form>
                        @endif
                        @endrole
                        @role('admin')
                        <div class="d-flex justify-content-around">
                            
                            <a href="{{route('ukm.show', $ukm->id)}}" class="btn btn-primary">Detail</a>
                            <div class="d-flex justify-content-around gap-2">
                                <a href="{{route('ukm.edit', $ukm->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('ukm.destroy', $ukm->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">hapus</button>
                                </form>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

  @endsection