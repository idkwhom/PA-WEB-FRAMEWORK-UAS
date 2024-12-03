<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">UKM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    @role('user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ukm.index')}}">Daftar UKM</a>
                    </li>
                    @endrole
                    <li class="nav-item">
                        <form method="POST" action="/logout" style="display:none;" id='logoutForm'>
                            @csrf
                        </form>
                        <a class="nav-link" onclick="formSubmit()"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
@yield('content')

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
