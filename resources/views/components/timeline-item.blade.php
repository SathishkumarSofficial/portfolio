@props(['experience'])

<div class="timeline-item position-relative mb-5" data-aos="fade-up">
    <!-- Timeline Dot -->
    <div class="timeline-dot position-absolute rounded-circle bg-blue border border-white" style="width: 20px; height: 20px; left: -10px; top: 0;"></div>
    
    <!-- Timeline Content -->
    <div class="timeline-content ms-4 p-4 rounded bg-dark border-start border-blue border-3 shadow-sm text-white glass-card">
        <span class="badge bg-primary mb-2 text-uppercase tracking-wider small">{{ $experience->duration }}</span>
        <h4 class="fw-bold text-white mb-1">{{ $experience->designation }}</h4>
        <h5 class="text-blue fw-normal mb-3"><i class="fa-solid fa-building me-2"></i>{{ $experience->company }}</h5>
        
        <ul class="list-unstyled mb-0">
            @foreach($experience->responsibilities ?? [] as $resp)
                <li class="mb-2 d-flex align-items-start">
                    <i class="fa-solid fa-chevron-right text-blue me-2 mt-1 small"></i>
                    <span>{{ $resp }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
