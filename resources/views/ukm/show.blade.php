@extends('layouts.layouts')
@section('content')
    <!-- Content -->
    <div class="container my-5">
        <div class="row text-center">
            <h1 class="mb-4">Welcome to UKM UNMUL Dashboard</h1>
            <p class="lead">UKM adalah lembaga kemahasiswaan yang menjadi wadah bagi mahasiswa yang memiliki kesamaan minat, kegemaran, dan kreativitas.</p>
        </div>

        <h1>Member</h1>
        <div class="row my-4">
            @foreach ($users as $user)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Nama Anggota: {{$user->User->nama}}</p>
                        <p class="card-text">Nim: {{$user->User->nim}}</p>
                        <p class="card-text">Fakultas: {{$user->User->fakultas}}</p>
                        <p class="card-text">Prodi: {{$user->User->prodi}}</p>
                        <form action="/kick/{{$user->id}}" method="post">
                            @csrf
                            <button class="btn btn-danger">Kick</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h1>Pendaftar Baru</h1>
        <div class="row my-4">
            @foreach ($usersWaiting as $user)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Nama Anggota: {{$user->User->nama}}</p>
                        <p class="card-text">Nim: {{$user->User->nim}}</p>
                        <p class="card-text">Fakultas: {{$user->User->fakultas}}</p>
                        <p class="card-text">Prodi: {{$user->User->prodi}}</p>
                        <form action="/accept/{{$user->id}}" method="post">
                            @csrf
                            <button class="btn btn-success">Accept</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 UKM Dashboard. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function formSubmit(){
        event.preventDefault();
        document.getElementById("logoutForm").submit();
        return false;
    }
</script>
</html>
@endsection