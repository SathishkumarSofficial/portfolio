@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-8 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-pencil text-primary me-2"></i>Edit Achievement</h5>
        
        <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="form-label text-secondary small fw-bold">Achievement Description</label>
                <textarea name="title" class="form-control" rows="4" required>{{ old('title', $achievement->title) }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.achievements.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Update Achievement</button>
            </div>
        </form>
    </div>
@endsection
