@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-plus text-primary me-2"></i>Add Education</h5>
        
        <form action="{{ route('admin.education.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Degree</label>
                    <input type="text" name="degree" class="form-control" placeholder="e.g. Bachelor of Engineering" required value="{{ old('degree') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Major / Subject</label>
                    <input type="text" name="major" class="form-control" placeholder="e.g. Computer Science and Engineering" required value="{{ old('major') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Institution</label>
                    <input type="text" name="institution" class="form-control" placeholder="e.g. Sembodai Rukmani Varatharajan Engineering College" required value="{{ old('institution') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Affiliated University</label>
                    <input type="text" name="university" class="form-control" placeholder="e.g. Anna University" required value="{{ old('university') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Duration</label>
                    <input type="text" name="duration" class="form-control" placeholder="e.g. 2020–2024" required value="{{ old('duration') }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label text-secondary small fw-bold">GPA / Score (%)</label>
                    <input type="text" name="score" class="form-control" placeholder="e.g. 79%" required value="{{ old('score') }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label text-secondary small fw-bold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" placeholder="0" required value="{{ old('sort_order', 0) }}">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.education.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Save Education</button>
            </div>
        </form>
    </div>
@endsection
