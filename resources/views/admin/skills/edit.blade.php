@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-8 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-pencil text-primary me-2"></i>Edit Skill</h5>
        
        <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label text-secondary small fw-bold">Skill Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $skill->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label text-secondary small fw-bold">Category</label>
                <select name="category" class="form-select form-control" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ old('category', $skill->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label text-secondary small fw-bold">Proficiency Level (0-100%)</label>
                <input type="number" name="level" class="form-control" value="{{ old('level', $skill->level) }}" required min="0" max="100">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.skills.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Update Skill</button>
            </div>
        </form>
    </div>
@endsection
