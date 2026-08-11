@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-pencil text-primary me-2"></i>Edit Experience</h5>
        
        <form action="{{ route('admin.experiences.update', $experience->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Company Name</label>
                    <input type="text" name="company" class="form-control" value="{{ old('company', $experience->company) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Designation</label>
                    <input type="text" name="designation" class="form-control" value="{{ old('designation', $experience->designation) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Duration</label>
                    <input type="text" name="duration" class="form-control" value="{{ old('duration', $experience->duration) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $experience->sort_order) }}" required>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label text-secondary small fw-bold">Responsibilities (One per line)</label>
                    <textarea name="responsibilities_raw" class="form-control" rows="8" required>{{ old('responsibilities_raw', $experience->responsibilities_raw) }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Update Experience</button>
            </div>
        </form>
    </div>
@endsection
