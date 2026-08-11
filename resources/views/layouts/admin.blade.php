<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard | Portfolio Manager</title>
    
    <!-- Fonts & FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Style Bundle (Vite) -->
    @vite(['resources/css/app.css'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0f172a !important;
            color: #f1f5f9;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #0b0f19;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        .sidebar-brand {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-weight: 700;
        }
        .sidebar .nav-link {
            color: #94a3b8;
            padding: 0.8rem 1rem;
            margin: 0.2rem 0.5rem;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }
        .sidebar .nav-link i {
            width: 24px;
            font-size: 1.1rem;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #1e293b;
            color: #38bdf8 !important;
        }
        .sidebar .nav-link.active::after {
            display: none;
        }
        .admin-navbar {
            background-color: #0b0f19;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1rem 2rem;
        }
        .card-admin {
            background-color: #1e293b;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
        }
        .table-admin {
            color: #f1f5f9;
        }
        .table-admin th {
            background-color: #0b0f19;
            color: #94a3b8;
            border-bottom: 2px solid #334155;
            padding: 1rem;
        }
        .table-admin td {
            background-color: #1e293b;
            border-bottom: 1px solid #334155;
            padding: 1rem;
            vertical-align: middle;
        }
        .alert-admin {
            background-color: #0f172a;
            border-color: rgba(255, 255, 255, 0.05);
            color: #f1f5f9;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 col-lg-2 px-0 sidebar d-none d-md-block">
                <div class="sidebar-brand text-white text-center">
                    <a href="{{ url('/') }}" target="_blank" class="text-white text-decoration-none fs-5">
                        <i class="fa-solid fa-earth-americas text-blue me-2"></i>Sathish Port
                    </a>
                </div>
                <div class="p-3">
                    <div class="text-secondary small fw-bold text-uppercase px-2 mb-2">Main Panel</div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="fa-solid fa-gauge"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">
                                <i class="fa-solid fa-user-gear"></i>Site Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                                <i class="fa-solid fa-envelope"></i>Messages
                            </a>
                        </li>
                    </ul>

                    <div class="text-secondary small fw-bold text-uppercase px-2 mt-4 mb-2">CRUD Sections</div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.skills.*') ? 'active' : '' }}" href="{{ route('admin.skills.index') }}">
                                <i class="fa-solid fa-brain"></i>Skills
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.experiences.*') ? 'active' : '' }}" href="{{ route('admin.experiences.index') }}">
                                <i class="fa-solid fa-briefcase"></i>Experiences
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                                <i class="fa-solid fa-laptop-code"></i>Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.certificates.*') ? 'active' : '' }}" href="{{ route('admin.certificates.index') }}">
                                <i class="fa-solid fa-certificate"></i>Certificates
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.education.*') ? 'active' : '' }}" href="{{ route('admin.education.index') }}">
                                <i class="fa-solid fa-graduation-cap"></i>Education
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('admin.achievements.*') ? 'active' : '' }}" href="{{ route('admin.achievements.index') }}">
                                <i class="fa-solid fa-trophy"></i>Achievements
                            </a>
                        </li>
                    </ul>

                    <div class="mt-5 px-2">
                        <form action="{{ route('admin.logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to logout?')">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100 rounded-pill">
                                <i class="fa-solid fa-power-off me-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 px-0">
                <!-- Top Navbar -->
                <nav class="navbar admin-navbar d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-white fw-bold">
                        <i class="fa-solid fa-lock text-primary me-2"></i>Administration
                    </h5>
                    <div class="d-flex align-items-center">
                        <span class="text-secondary me-3 d-none d-sm-inline">Logged in as:</span>
                        <span class="badge bg-primary px-3 py-2 fw-bold">{{ Auth::user()->name ?? 'Admin' }}</span>
                        <!-- Mobile Logout Button -->
                        <form action="{{ route('admin.logout') }}" method="POST" class="d-md-none ms-3">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-power-off"></i></button>
                        </form>
                    </div>
                </nav>

                <!-- Page Content -->
                <div class="p-4">
                    <!-- Session Status Alerts -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0" role="alert" style="background-color: rgba(25, 135, 84, 0.15); color: #2ec946;">
                            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show border-0" role="alert" style="background-color: rgba(220, 53, 69, 0.15); color: #ea868f;">
                            <i class="fa-solid fa-circle-exclamation me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
