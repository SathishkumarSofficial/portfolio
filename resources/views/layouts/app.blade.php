<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Primary SEO Meta Tags -->
    <title>{{ $settings['seo_title'] ?? 'Sathishkumar S | Full Stack Developer' }}</title>
    <meta name="description" content="{{ $settings['seo_description'] ?? 'Motivated Full Stack Developer specializing in PHP Laravel, MySQL, HTML, CSS, JavaScript, and AWS concepts.' }}">
    <meta name="keywords" content="{{ $settings['seo_keywords'] ?? 'Sathishkumar S, Full Stack Developer, PHP Laravel, AWS Enthusiast, Portfolio, Web Developer' }}">
    <meta name="author" content="{{ $settings['name'] ?? 'Sathishkumar S' }}">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ $settings['seo_title'] ?? 'Sathishkumar S | Full Stack Developer' }}">
    <meta property="og:description" content="{{ $settings['seo_description'] ?? 'Full Stack Developer & AWS Enthusiast. View my projects, skills, and work history.' }}">
    <meta property="og:image" content="{{ url($settings['profile_image'] ?? 'PROFILE_BACKGROUND_IMAGE') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="{{ $settings['seo_title'] ?? 'Sathishkumar S | Full Stack Developer' }}">
    <meta property="twitter:description" content="{{ $settings['seo_description'] ?? 'Full Stack Developer & AWS Enthusiast. View my projects, skills, and work history.' }}">
    <meta property="twitter:image" content="{{ url($settings['profile_image'] ?? 'PROFILE_BACKGROUND_IMAGE') }}">

    <!-- Google Fonts & FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- CDN Styles (Bootstrap, AOS, Swiper) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet">
    
    <!-- Custom Style Bundle (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Analytics Placeholder -->
    @if(!empty($settings['google_analytics_id']) && $settings['google_analytics_id'] !== 'UA-XXXXX-Y')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['google_analytics_id'] }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ $settings['google_analytics_id'] }}');
    </script>
    @endif

    <!-- Structured JSON-LD Data for SEO -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Person",
      "name": "{{ $settings['name'] ?? 'SATHISHKUMAR S' }}",
      "jobTitle": "{{ $settings['designation'] ?? 'Full Stack Developer' }}",
      "url": "{{ url('/') }}",
      "sameAs": [
        "{{ $settings['linkedin_link'] ?? '#' }}",
        "{{ $settings['github_link'] ?? '#' }}"
      ],
      "knowsAbout": [
        "Software Development", "PHP", "Laravel", "MySQL", "AWS", "Cloud Computing"
      ],
      "worksFor": {
        "@@type": "Organization",
        "name": "Vhilv Technology Pvt Ltd"
      }
    }
    </script>
</head>
<body>

    <!-- 1. Preloader Screen -->
    <div id="loader-wrapper">
        <div class="text-center">
            <div class="loader-spinner mb-3"></div>
            <div class="text-white fw-bold tracking-widest text-uppercase small">Loading Portfolio...</div>
        </div>
    </div>

    <!-- 2. Custom Cursor (Dynamic Trackers) -->
    <div class="custom-cursor"></div>
    <div class="custom-cursor-dot"></div>

    <!-- 3. Scroll Progress Indicator -->
    <div id="scroll-progress"></div>

    <!-- 4. Sticky Header / Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top sticky-navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold text-white fs-4" href="{{ url('/') }}">
                <span class="text-blue">SATHISH</span>PORTFOLIO
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="#hero">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#certifications">Certificates</a></li>
                    <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    
                    <!-- Theme Toggle Switch -->
                    <li class="nav-item ms-lg-3 my-2 my-lg-0">
                        <button id="theme-toggle-btn" class="theme-switch-btn" title="Toggle Light/Dark Theme">
                            <i class="fa-solid fa-sun"></i>
                        </button>
                    </li>
                    
                    <!-- Admin Login/Dashboard Access -->
                    <li class="nav-item ms-lg-3">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-blue btn-sm px-3 py-2 rounded-pill fw-bold">
                                <i class="fa-solid fa-gauge me-2"></i>Dashboard
                            </a>
                        @else
                            <a href="{{ route('admin.login') }}" class="btn btn-outline-blue btn-sm px-3 py-2 rounded-pill fw-bold" title="Admin Login">
                                <i class="fa-solid fa-lock me-2"></i>Admin
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- 5. Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container text-center">
            <div class="mb-4">
                @if($settings['profile_image'] === 'PROFILE_BACKGROUND_IMAGE' || empty($settings['profile_image']))
                    <div class="footer-logo d-inline-flex align-items-center justify-content-center bg-secondary rounded-circle" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-user text-white"></i>
                    </div>
                @else
                    <img src="{{ $settings['profile_image'] }}" class="footer-logo rounded-circle mb-2" alt="SATHISHKUMAR S" style="width: 60px; height: 60px;">
                @endif
                <h4 class="mt-2 fw-bold text-white mb-0">{{ $settings['name'] ?? 'SATHISHKUMAR S' }}</h4>
                <p class="text-blue small">{{ $settings['designation'] ?? 'Full Stack Developer' }}</p>
            </div>
            
            <!-- Quick Links -->
            <div class="mb-4 d-flex justify-content-center flex-wrap gap-3">
                <a href="#hero" class="text-gray-400 text-decoration-none hover-text-blue">Home</a>
                <a href="#about" class="text-gray-400 text-decoration-none hover-text-blue">About</a>
                <a href="#skills" class="text-gray-400 text-decoration-none hover-text-blue">Skills</a>
                <a href="#experience" class="text-gray-400 text-decoration-none hover-text-blue">Experience</a>
                <a href="#projects" class="text-gray-400 text-decoration-none hover-text-blue">Projects</a>
                <a href="#certifications" class="text-gray-400 text-decoration-none hover-text-blue">Certificates</a>
                <a href="#education" class="text-gray-400 text-decoration-none hover-text-blue">Education</a>
            </div>

            <!-- Social Links -->
            <div class="mb-4">
                <a href="{{ $settings['socials']['github'] ?? 'YOUR_GITHUB_LINK' }}" target="_blank" class="social-icon-btn mx-2">
                    <i class="fa-brands fa-github"></i>
                </a>
                <a href="{{ $settings['socials']['linkedin'] ?? 'YOUR_LINKEDIN_LINK' }}" target="_blank" class="social-icon-btn mx-2">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a href="mailto:{{ $settings['socials']['email'] ?? 'YOUR_EMAIL_PLACEHOLDER' }}" class="social-icon-btn mx-2">
                    <i class="fa-solid fa-envelope"></i>
                </a>
            </div>

            <p class="text-gray-500 small mb-0">&copy; {{ date('Y') }} {{ $settings['name'] ?? 'SATHISHKUMAR S' }}. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" id="back-to-top" class="btn btn-blue rounded-circle btn-lg shadow-lg">
        <i class="fa-solid fa-arrow-up"></i>
    </a>

    <!-- CDN Script Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>
