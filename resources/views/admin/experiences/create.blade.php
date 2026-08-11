@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-plus text-primary me-2"></i>Add Experience</h5>
        
        <form action="{{ route('admin.experiences.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Company Name</label>
                    <input type="text" name="company" class="form-control" placeholder="e.g. Vhilv Technology Pvt Ltd" required value="{{ old('company') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Designation</label>
                    <input type="text" name="designation" class="form-control" placeholder="e.g. Full Stack Developer" required value="{{ old('designation') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Duration</label>
                    <input type="text" name="duration" class="form-control" placeholder="e.g. June 16 2025 – Present" required value="{{ old('duration') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" placeholder="0" required value="{{ old('sort_order', 0) }}">
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label text-secondary small fw-bold">Responsibilities (One per line)</label>
                    <textarea name="responsibilities_raw" class="form-control" rows="8" placeholder="Developed full stack web applications...&#10;Built secure admin panels...&#10;Designed optimized MySQL..." required>{{ old('responsibilities_raw') }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Save Experience</button>
            </div>
        </form>
    </div>
@endsection
