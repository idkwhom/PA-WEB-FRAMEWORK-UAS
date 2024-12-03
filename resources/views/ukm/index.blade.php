@extends('layouts.layouts')
@section('content')
    <!-- Content -->
    <div class="container my-5">
        <div class="row text-center">
            <h1 class="mb-4">Welcome to UKM UNMUL Dashboard</h1>
            <p class="lead">UKM adalah lembaga kemahasiswaan yang menjadi wadah bagi mahasiswa yang memiliki kesamaan minat, kegemaran, dan kreativitas.</p>
        </div>


        <div class="row my-4">
            @foreach ($ukms as $ukm)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{$ukm->Ukm->file_path?$ukm->Ukm->file_path.$ukm->Ukm->file_name:"https://via.placeholder.com/300x200"}}" class="card-img-top" alt="UKM Image 1">
                    <div class="card-body">
                        <p class="card-text">Nama UKM: {{$ukm->Ukm->nama_ukm}}</p>
                        <form action="/kick/{{$ukm->id}}" method="post">
                            @csrf
                            <button class="btn btn-danger">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection