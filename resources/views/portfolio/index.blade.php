@extends('layouts.app')

@section('content')

    <!-- ========================================== -->
    <!-- 1. HERO SECTION                            -->
    <!-- ========================================== -->
    <section id="hero" class="hero-section">
        <!-- Interactive Canvas Particles Background -->
        <canvas id="particles-canvas" class="hero-particles"></canvas>
        
        <!-- Floating Shapes (Aesthetic) -->
        <div class="shape-1"></div>
        <div class="shape-2"></div>
        
        <div class="container position-relative" style="z-index: 10;">
            <div class="row align-items-center">
                <!-- Text Intro -->
                <div class="col-lg-7 text-center text-lg-start hero-content">
                    <h5 class="text-blue text-uppercase tracking-widest fw-bold mb-3">Welcome to my Portfolio</h5>
                    <h1 class="display-3 fw-extrabold text-white mb-2">{{ $settings['name'] ?? 'SATHISHKUMAR S' }}</h1>
                    
                    <!-- Animated Typing Subtitle -->
                    <p class="fs-3 text-gray-300 mb-4">
                        I am a <span id="typed-text" class="text-blue fw-bold" data-strings="{{ json_encode($settings['titles'] ?? []) }}"></span>
                    </p>
                    
                    <p class="text-gray-400 fs-5 mb-5 max-w-xl">
                        Passionate about crafting premium backend architectures, scalable database schemas, and highly functional full-stack web applications. Eager to continuously learn and drive cloud solutions.
                    </p>
                    
                    <div class="hero-buttons d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                        <a href="{{ $settings['resume_link'] ?? '#' }}" target="_blank" class="btn btn-blue px-5 py-3 rounded-pill fw-bold">
                            <i class="fa-solid fa-file-arrow-down me-2"></i>Download CV
                        </a>
                        <a href="#contact" class="btn btn-outline-blue px-5 py-3 rounded-pill fw-bold text-white">
                            <i class="fa-solid fa-envelope me-2"></i>Hire Me
                        </a>
                        <a href="#projects" class="btn btn-outline-secondary border-secondary hover-bg-white hover-text-dark px-4 py-3 rounded-pill fw-bold text-white">
                            View Projects
                        </a>
                    </div>
                </div>

                <!-- Profile Photo Blob -->
                <div class="col-lg-5 mt-5 mt-lg-0 hero-image-col">
                    <div class="hero-image-wrapper shadow-lg">
                        @if($settings['hero_image'] === 'YOUR_IMAGE_PATH' || empty($settings['hero_image']))
                            <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center bg-dark text-white text-center">
                                <i class="fa-solid fa-user-tie fa-4x text-blue mb-3"></i>
                                <span class="text-uppercase tracking-wider fw-bold small">YOUR_IMAGE_PATH</span>
                            </div>
                        @else
                            <img src="{{ $settings['hero_image'] }}" alt="{{ $settings['name'] ?? 'Sathishkumar S' }}" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 2. ABOUT ME SECTION                        -->
    <!-- ========================================== -->
    <section id="about" class="py-5 bg-dark text-white position-relative border-top border-bottom border-secondary">
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- About Image -->
                <div class="col-lg-5 mb-5 mb-lg-0 text-center" data-aos="fade-right">
                    <div class="position-relative d-inline-block">
                        @if($settings['about_image'] === 'ABOUT_IMAGE' || empty($settings['about_image']))
                            <div class="img-fluid rounded shadow-lg border border-secondary bg-secondary d-flex align-items-center justify-content-center" style="width: 380px; height: 380px; max-width: 100%;">
                                <div class="text-center p-3">
                                    <i class="fa-solid fa-code fa-3x text-blue mb-3"></i>
                                    <p class="mb-0 text-uppercase fw-bold small">ABOUT_IMAGE</p>
                                </div>
                            </div>
                        @else
                            <img src="{{ $settings['about_image'] }}" alt="About Me" class="img-fluid rounded shadow-lg border border-secondary" style="max-width: 380px;">
                        @endif
                    </div>
                </div>

                <!-- About Description -->
                <div class="col-lg-7" data-aos="fade-left">
                    <h5 class="text-blue text-uppercase tracking-wider mb-2">// 02. About Me</h5>
                    <h2 class="fw-bold mb-4">Crafting robust code & cloud deployments</h2>
                    <p class="text-gray-400 mb-4 leading-relaxed fs-5">
                        {{ $settings['bio'] ?? '' }}
                    </p>

                    <!-- Stat Counters -->
                    <div class="row g-3 mb-5 mt-4">
                        <div class="col-6 col-sm-3">
                            <div class="counter-box bg-dark-card border border-secondary text-center p-3 rounded">
                                <div class="counter-number fw-bold fs-2 text-blue" data-target="1">0</div>
                                <span class="small text-gray-400">Years Experience</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="counter-box bg-dark-card border border-secondary text-center p-3 rounded">
                                <div class="counter-number fw-bold fs-2 text-blue" data-target="4">0</div>
                                <span class="small text-gray-400">Projects Complete</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="counter-box bg-dark-card border border-secondary text-center p-3 rounded">
                                <div class="counter-number fw-bold fs-2 text-blue" data-target="30">0</div>
                                <span class="small text-gray-400">Skills Mastered</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="counter-box bg-dark-card border border-secondary text-center p-3 rounded">
                                <div class="counter-number fw-bold fs-2 text-blue" data-target="1">0</div>
                                <span class="small text-gray-400">Certificates</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ $settings['resume_link'] ?? '#' }}" target="_blank" class="btn btn-blue px-4 py-3 rounded-pill fw-bold">
                        <i class="fa-solid fa-file-pdf me-2"></i>Download Resume
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 3. TECHNICAL SKILLS                        -->
    <!-- ========================================== -->
    <section id="skills" class="py-5 text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 03. Technical Skills</h5>
                <h2 class="fw-bold">My Programming Arsenal</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <!-- Category Filter Tabs -->
            <div class="d-flex justify-content-center flex-wrap gap-2 mb-5" data-aos="fade-up">
                <button class="btn filter-btn active rounded-pill px-4" data-filter="all">All</button>
                @foreach($skills->keys() as $category)
                    <button class="btn filter-btn rounded-pill px-4" data-filter="{{ str_replace(' ', '-', $category) }}">{{ $category }}</button>
                @endforeach
            </div>

            <!-- Skills Cards -->
            <div class="row" id="skills-container">
                @foreach($skills as $category => $list)
                    @foreach($list as $skill)
                        <x-skill-card :name="$skill->name" :level="$skill->level" />
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 4. WORK EXPERIENCE                         -->
    <!-- ========================================== -->
    <section id="experience" class="py-5 bg-dark border-top border-bottom border-secondary text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 04. Work Experience</h5>
                <h2 class="fw-bold">Professional History</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="timeline-wrapper position-relative">
                        @foreach($experiences as $exp)
                            <x-timeline-item :experience="$exp" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 5. FEATURED PROJECTS                       -->
    <!-- ========================================== -->
    <section id="projects" class="py-5 text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 05. Portfolios</h5>
                <h2 class="fw-bold">Featured Projects</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <!-- Search and Tech Filters -->
            <div class="row g-3 justify-content-between align-items-center mb-5" data-aos="fade-up">
                <!-- Filter Buttons -->
                <div class="col-md-7 d-flex flex-wrap gap-2">
                    <button class="btn filter-btn active rounded-pill px-4" data-filter="all">All Tech</button>
                    <button class="btn filter-btn rounded-pill px-4" data-filter="php">PHP</button>
                    <button class="btn filter-btn rounded-pill px-4" data-filter="mysql">MySQL</button>
                    <button class="btn filter-btn rounded-pill px-4" data-filter="javascript">JavaScript</button>
                </div>
                
                <!-- Search Box -->
                <div class="col-md-4">
                    <div class="position-relative">
                        <input type="text" id="project-search" class="form-control rounded-pill ps-4 pe-5" placeholder="Search projects...">
                        <i class="fa-solid fa-magnifying-glass position-absolute end-0 top-50 translate-middle-y me-4 text-gray-500"></i>
                    </div>
                </div>
            </div>

            <!-- Project Cards Grid -->
            <div class="row g-4" id="projects-grid">
                @foreach($projects as $proj)
                    <x-project-card :project="$proj" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 6. CERTIFICATIONS                          -->
    <!-- ========================================== -->
    <section id="certifications" class="py-5 bg-dark border-top border-bottom border-secondary text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 06. Certifications</h5>
                <h2 class="fw-bold">Validated Competency</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <div class="row justify-content-center">
                @foreach($certificates as $cert)
                    <div class="col-md-8 col-lg-6 mb-4" data-aos="flip-up">
                        <div class="card glass-card h-100 border-0 p-4 text-center">
                            <!-- Certificate Placeholder -->
                            <div class="cert-img-container mb-4 position-relative overflow-hidden bg-black rounded" style="height: 180px;">
                                @if($cert->image === 'CERTIFICATE_IMAGE' || empty($cert->image))
                                    <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white">
                                        <i class="fa-solid fa-award fa-4x text-blue mb-2"></i>
                                        <span class="text-uppercase small tracking-widest text-secondary">CERTIFICATE_IMAGE</span>
                                    </div>
                                @else
                                    <img src="{{ $cert->image }}" alt="{{ $cert->title }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                @endif
                            </div>
                            <h4 class="fw-bold text-white mb-2">{{ $cert->title }}</h4>
                            <p class="text-blue mb-4">{{ $cert->issuer }}</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ $cert->verify_link }}" target="_blank" class="btn btn-blue px-4 py-2 rounded-pill fw-bold btn-sm">
                                    Verify Certificate
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 7. EDUCATION                               -->
    <!-- ========================================== -->
    <section id="education" class="py-5 text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 07. Education</h5>
                <h2 class="fw-bold">Academic Background</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="timeline-wrapper position-relative">
                        @foreach($education as $edu)
                            <div class="timeline-item position-relative mb-5" data-aos="fade-up">
                                <div class="timeline-dot position-absolute rounded-circle bg-blue border border-white" style="width: 20px; height: 20px; left: -10px; top: 0;"></div>
                                <div class="timeline-content ms-4 p-4 rounded bg-dark border-start border-white border-3 shadow-sm text-white glass-card">
                                    <span class="badge bg-secondary mb-2 text-uppercase tracking-wider small">{{ $edu->duration }}</span>
                                    <h4 class="fw-bold text-white mb-1">{{ $edu->degree }}</h4>
                                    <h5 class="text-blue fw-normal mb-2">{{ $edu->major }}</h5>
                                    <p class="mb-2 text-gray-300">
                                        <i class="fa-solid fa-building-columns me-2"></i>{{ $edu->institution }} ({{ $edu->university }})
                                    </p>
                                    <div class="mt-3">
                                        <span class="badge bg-blue-dim text-blue px-3 py-2 rounded-pill fw-bold">GPA / Score: {{ $edu->score }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 8. ACHIEVEMENTS                            -->
    <!-- ========================================== -->
    <section id="achievements" class="py-5 bg-dark border-top border-bottom border-secondary text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 08. Accomplishments</h5>
                <h2 class="fw-bold">Achievements & Honors</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <div class="row">
                @foreach($achievements as $ach)
                    <x-achievement-card :achievement="$ach" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 9. AREAS OF INTEREST                       -->
    <!-- ========================================== -->
    <section id="interests" class="py-5 text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 09. Pursuits</h5>
                <h2 class="fw-bold">Areas of Interest</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <div class="row justify-content-center">
                @foreach(config('profile.interests') as $interest)
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="card glass-card border-0 h-100 p-4 text-center hover-lift">
                            <div class="text-blue mb-3">
                                <i class="fa-solid fa-compass fa-3x"></i>
                            </div>
                            <h5 class="fw-bold text-white mb-0">{{ $interest }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 10. CORE ATTRIBUTES                        -->
    <!-- ========================================== -->
    <section id="attributes" class="py-5 bg-dark border-top border-bottom border-secondary text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 10. Characteristics</h5>
                <h2 class="fw-bold">Core Attributes</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card glass-card border-0 p-5 shadow-lg">
                        <div class="row g-4">
                            @foreach(config('profile.attributes') as $attr)
                                <div class="col-md-6" data-aos="fade-up">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span class="fw-bold text-white">{{ $attr['name'] }}</span>
                                            <span class="text-blue fw-bold">{{ $attr['level'] }}%</span>
                                        </div>
                                        <div class="progress bg-black" style="height: 8px;">
                                            <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $attr['level'] }}%" aria-valuenow="{{ $attr['level'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 11. CONTACT SECTION                        -->
    <!-- ========================================== -->
    <section id="contact" class="py-5 text-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h5 class="text-blue text-uppercase tracking-wider mb-2">// 11. Connection</h5>
                <h2 class="fw-bold">Get In Touch</h2>
                <div class="bg-blue mx-auto mt-2" style="width: 60px; height: 3px;"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card glass-card border-0 shadow-lg overflow-hidden">
                        <div class="row g-0">
                            <!-- Contact details column -->
                            <div class="col-md-5 bg-dark p-5 d-flex flex-column justify-content-between border-end border-secondary">
                                <div>
                                    <h4 class="fw-bold text-white mb-4">Contact Info</h4>
                                    <p class="text-gray-400 mb-5">Fill out the form and I will get back to you within 24 hours.</p>
                                    
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="text-blue me-3 fs-4"><i class="fa-solid fa-phone"></i></div>
                                        <div>
                                            <span class="text-secondary small d-block">Phone</span>
                                            <span class="text-white fw-bold">{{ $settings['phone'] ?? 'YOUR_PHONE_PLACEHOLDER' }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="text-blue me-3 fs-4"><i class="fa-solid fa-envelope"></i></div>
                                        <div>
                                            <span class="text-secondary small d-block">Email</span>
                                            <span class="text-white fw-bold">{{ $settings['email'] ?? 'YOUR_EMAIL_PLACEHOLDER' }}</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="text-blue me-3 fs-4"><i class="fa-solid fa-location-dot"></i></div>
                                        <div>
                                            <span class="text-secondary small d-block">Location</span>
                                            <span class="text-white fw-bold">{{ $settings['location'] ?? 'Tamil Nadu, India' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <span class="text-secondary small d-block mb-2">Socials</span>
                                    <div class="d-flex gap-2">
                                        <a href="{{ $settings['socials']['github'] ?? '#' }}" target="_blank" class="social-icon-btn"><i class="fa-brands fa-github"></i></a>
                                        <a href="{{ $settings['socials']['linkedin'] ?? '#' }}" target="_blank" class="social-icon-btn"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Form column -->
                            <div class="col-md-7 p-5">
                                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label small">Name</label>
                                            <input type="text" name="name" class="form-control" required placeholder="John Doe">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label small">Email Address</label>
                                            <input type="email" name="email" class="form-control" required placeholder="john@example.com">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label small">Phone (Optional)</label>
                                            <input type="text" name="phone" class="form-control" placeholder="+1 123 456 7890">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label small">Subject (Optional)</label>
                                            <input type="text" name="subject" class="form-control" placeholder="Project Discussion">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label small">Message</label>
                                            <textarea name="message" class="form-control" rows="5" required placeholder="Write your message here..."></textarea>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-blue w-100 py-3 rounded-pill fw-bold">
                                                <i class="fa-solid fa-paper-plane me-2"></i>Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div id="form-response" class="alert mt-3" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
