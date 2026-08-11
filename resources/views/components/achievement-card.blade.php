@props(['achievement'])

<div class="col-md-6 col-lg-4 mb-4" data-aos="zoom-in">
    <div class="card achievement-card h-100 border-0 bg-dark text-white p-4 shadow-sm position-relative overflow-hidden glass-card text-center hover-lift">
        <div class="achievement-icon-wrapper mb-3 mx-auto d-flex align-items-center justify-content-center rounded-circle bg-blue-dim" style="width: 70px; height: 70px;">
            <i class="fa-solid fa-trophy fa-2x text-blue"></i>
        </div>
        <p class="card-text fw-bold text-white mb-0 leading-relaxed">{{ $achievement->title }}</p>
    </div>
</div>
