@props(['name', 'level'])

@php
    $lowerName = strtolower($name);
    $icon = 'fa-solid fa-code';
    
    if (str_contains($lowerName, 'php')) {
        $icon = 'fa-brands fa-php text-primary';
    } elseif (str_contains($lowerName, 'laravel')) {
        $icon = 'fa-brands fa-laravel text-danger';
    } elseif (str_contains($lowerName, 'html5') || str_contains($lowerName, 'html')) {
        $icon = 'fa-brands fa-html5 text-warning';
    } elseif (str_contains($lowerName, 'css3') || str_contains($lowerName, 'css')) {
        $icon = 'fa-brands fa-css3-alt text-info';
    } elseif (str_contains($lowerName, 'javascript') || str_contains($lowerName, 'js')) {
        $icon = 'fa-brands fa-js text-warning';
    } elseif (str_contains($lowerName, 'python')) {
        $icon = 'fa-brands fa-python text-primary';
    } elseif (str_contains($lowerName, 'mysql') || str_contains($lowerName, 'database') || str_contains($lowerName, 'pdo')) {
        $icon = 'fa-solid fa-database text-info';
    } elseif (str_contains($lowerName, 'aws') || str_contains($lowerName, 'ec2') || str_contains($lowerName, 's3') || str_contains($lowerName, 'vpc') || str_contains($lowerName, 'iam') || str_contains($lowerName, 'lambda') || str_contains($lowerName, 'rds') || str_contains($lowerName, 'dynamodb') || str_contains($lowerName, 'cloud')) {
        $icon = 'fa-brands fa-aws text-warning';
    } elseif (str_contains($lowerName, 'git') || str_contains($lowerName, 'github')) {
        $icon = 'fa-brands fa-github text-light';
    } elseif (str_contains($lowerName, 'code') || str_contains($lowerName, 'vscode')) {
        $icon = 'fa-solid fa-laptop-code text-light';
    } elseif (str_contains($lowerName, 'xampp') || str_contains($lowerName, 'wamp') || str_contains($lowerName, 'cpanel') || str_contains($lowerName, 'hosting') || str_contains($lowerName, 'deployment')) {
        $icon = 'fa-solid fa-server text-success';
    }
@endphp

<div class="col-6 col-md-4 col-lg-3 mb-4" data-aos="zoom-in">
    <div class="card skill-card h-100 border-0 bg-dark text-white p-3 text-center shadow-sm position-relative overflow-hidden glass-card">
        <div class="skill-card-inner">
            <!-- Icon -->
            <div class="skill-icon-wrapper mb-3 mx-auto d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: rgba(255, 255, 255, 0.05);">
                <i class="{{ $icon }} fa-2x"></i>
            </div>
            
            <!-- Skill Name -->
            <h6 class="fw-bold mb-2 text-white text-truncate">{{ $name }}</h6>
            
            <!-- Skill Percentage -->
            <div class="skill-progress-container mb-2">
                <div class="progress bg-secondary" style="height: 6px; border-radius: 3px;">
                    <div class="progress-bar bg-blue progress-bar-animated" role="progressbar" 
                         style="width: 0%" data-level="{{ $level }}" aria-valuenow="{{ $level }}" 
                         aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
            </div>
            <span class="text-blue fw-bold small skill-percent-label">{{ $level }}%</span>
        </div>
    </div>
</div>
