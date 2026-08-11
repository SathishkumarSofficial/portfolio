@props(['project'])

<div class="col-md-6 col-lg-6 mb-4 project-item" data-tech="{{ implode(',', $project->technologies ?? []) }}" data-aos="fade-up">
    <div class="card project-card h-100 border-0 bg-dark text-white overflow-hidden shadow-lg position-relative">
        <!-- Project Image Overlay -->
        <div class="project-img-container position-relative overflow-hidden">
            @if($project->image === 'PROJECT_IMAGE' || empty($project->image))
                <div class="project-image-placeholder d-flex align-items-center justify-content-center bg-secondary text-light ratio ratio-16x9" style="height: 220px;">
                    <div class="text-center">
                        <i class="fa-solid fa-laptop-code fa-3x mb-2 text-primary"></i>
                        <p class="mb-0 text-uppercase fw-bold tracking-wide small">PROJECT_IMAGE</p>
                    </div>
                </div>
            @else
                <img src="{{ $project->image }}" class="card-img-top img-fluid project-img lazy" alt="{{ $project->name }}" loading="lazy" style="height: 220px; object-fit: cover;">
            @endif
            <div class="project-overlay d-flex align-items-center justify-content-center">
                <div class="project-overlay-links">
                    <a href="{{ $project->live_link }}" target="_blank" class="btn btn-primary rounded-circle mx-2 btn-lg" title="Live Demo">
                        <i class="fa-solid fa-up-right-from-square"></i>
                    </a>
                    <a href="{{ $project->github_link }}" target="_blank" class="btn btn-outline-light rounded-circle mx-2 btn-lg" title="GitHub Repository">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Project Details -->
        <div class="card-body p-4 d-flex flex-column">
            <!-- Badges -->
            <div class="mb-3 d-flex flex-wrap gap-2">
                @foreach($project->technologies ?? [] as $tech)
                    <span class="badge bg-blue-dim text-blue rounded-pill px-3 py-1 text-uppercase tracking-wider font-semibold small-badge">{{ $tech }}</span>
                @endforeach
            </div>

            <!-- Title -->
            <h4 class="card-title fw-bold text-white mb-2">{{ $project->name }}</h4>
            
            <!-- Description -->
            <p class="card-text text-gray-400 mb-4 flex-grow-1">{{ $project->description }}</p>

            <!-- Features -->
            @if(!empty($project->features))
                <div class="mb-4">
                    <h6 class="text-primary fw-bold text-uppercase tracking-wider small mb-2"><i class="fa-solid fa-list-check me-2"></i>Key Features</h6>
                    <ul class="list-unstyled text-gray-300 small-list mb-0">
                        @foreach(array_slice($project->features, 0, 5) as $feature)
                            <li class="mb-1"><i class="fa-solid fa-circle-check text-blue me-2"></i>{{ $feature }}</li>
                        @endforeach
                        @if(count($project->features) > 5)
                            <li class="text-muted italic small">+ {{ count($project->features) - 5 }} more features</li>
                        @endif
                    </ul>
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top border-secondary">
                <a href="{{ $project->live_link }}" target="_blank" class="btn btn-blue text-white btn-sm px-4 rounded-pill transition-all fw-bold">
                    <i class="fa-solid fa-globe me-2"></i>Live Demo
                </a>
                <a href="{{ $project->github_link }}" target="_blank" class="btn btn-outline-secondary btn-sm px-4 rounded-pill transition-all text-white border-secondary hover-bg-white hover-text-dark fw-bold">
                    <i class="fa-brands fa-github me-2"></i>GitHub
                </a>
            </div>
        </div>
    </div>
</div>
