<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
            background-color: #f8f9fa;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x400/?technology') no-repeat center center;
            background-size: cover;
            color: black;
            padding: 60px 0;
            text-align: center;
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        footer {
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f1f1f1;
        padding: 10px 0;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Navbar -->

<!-- Hero Section -->
<div>
    @if(session('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
@endif
</div>

<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 100px;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Register</h4>
                    </div>
    
               @if (session('message'))
                <div class="alert alert-success">
                {{ session('message') }}
                </div>
              @endif
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <form action="{{ url('/register/store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ url('/login') }}" class="btn btn-secondary">Already have an account? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
