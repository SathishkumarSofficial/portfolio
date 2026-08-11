@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-8 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-plus text-primary me-2"></i>Add Achievement</h5>
        
        <form action="{{ route('admin.achievements.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label text-secondary small fw-bold">Achievement Description</label>
                <textarea name="title" class="form-control" rows="4" placeholder="e.g. First Prize in Technical Debugging Event" required>{{ old('title') }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.achievements.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Save Achievement</button>
            </div>
        </form>
    </div>
@endsection
