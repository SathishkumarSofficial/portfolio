@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-pencil text-primary me-2"></i>Edit Education</h5>
        
        <form action="{{ route('admin.education.update', $education->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Degree</label>
                    <input type="text" name="degree" class="form-control" value="{{ old('degree', $education->degree) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Major / Subject</label>
                    <input type="text" name="major" class="form-control" value="{{ old('major', $education->major) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Institution</label>
                    <input type="text" name="institution" class="form-control" value="{{ old('institution', $education->institution) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Affiliated University</label>
                    <input type="text" name="university" class="form-control" value="{{ old('university', $education->university) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Duration</label>
                    <input type="text" name="duration" class="form-control" value="{{ old('duration', $education->duration) }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label text-secondary small fw-bold">GPA / Score (%)</label>
                    <input type="text" name="score" class="form-control" value="{{ old('score', $education->score) }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label text-secondary small fw-bold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $education->sort_order) }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.education.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Update Education</button>
            </div>
        </form>
    </div>
@endsection
