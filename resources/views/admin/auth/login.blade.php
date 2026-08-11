<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Portfolio Manager</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #060911;
            color: #d1d5db;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .login-card {
            background-color: #0b0f19;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 3rem;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #ffffff !important;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.05);
            border-color: #0052ff;
            box-shadow: 0 0 10px rgba(0, 82, 255, 0.15);
        }
        .btn-blue {
            background-color: #0052ff;
            color: #ffffff;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-blue:hover {
            background-color: #0041cc;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 82, 255, 0.3);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle mb-3" style="width: 60px; height: 60px; background: rgba(0, 82, 255, 0.12) !important;">
                <i class="fa-solid fa-lock text-primary fa-2x"></i>
            </div>
            <h4 class="text-white fw-bold">Admin Portal</h4>
            <p class="text-secondary small">Access database and configuration controls</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger border-0 small py-2 mb-3" style="background-color: rgba(220, 53, 69, 0.15); color: #ea868f;">
                <i class="fa-solid fa-triangle-exclamation me-2"></i>{{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-secondary small fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="admin@portfolio.com" required value="{{ old('email') }}">
            </div>
            <div class="mb-4">
                <label class="form-label text-secondary small fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="mb-4 form-check d-flex justify-content-between">
                <div>
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label text-secondary small" for="remember">Remember me</label>
                </div>
                <a href="{{ url('/') }}" class="text-primary text-decoration-none small">Cancel</a>
            </div>
            <button type="submit" class="btn btn-blue py-3">
                <i class="fa-solid fa-right-to-bracket me-2"></i>Sign In
            </button>
        </form>
    </div>

</body>
</html>
