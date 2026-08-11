@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-pencil text-primary me-2"></i>Edit Project</h5>
        
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Project Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $project->sort_order) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Live Demo Link</label>
                    <input type="text" name="live_link" class="form-control" value="{{ old('live_link', $project->live_link) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">GitHub Repository Link</label>
                    <input type="text" name="github_link" class="form-control" value="{{ old('github_link', $project->github_link) }}" required>
                </div>

                <!-- Technologies -->
                <div class="col-12 mb-3">
                    <label class="form-label text-secondary small fw-bold">Technologies Used (Comma-separated)</label>
                    <input type="text" name="technologies_raw" class="form-control" value="{{ old('technologies_raw', $project->technologies_raw) }}" required>
                </div>

                <!-- Image options -->
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Project Image File (Upload)</label>
                    @if($project->image && str_starts_with($project->image, '/uploads/'))
                        <div class="mb-2"><img src="{{ $project->image }}" height="50" class="rounded border border-secondary"></div>
                    @endif
                    <input type="file" name="image_file" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Project Image Placeholder String</label>
                    <input type="text" name="image_placeholder" class="form-control" value="{{ old('image_placeholder', $project->image) }}">
                </div>

                <!-- Description -->
                <div class="col-12 mb-3">
                    <label class="form-label text-secondary small fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $project->description) }}</textarea>
                </div>

                <!-- Features list -->
                <div class="col-12 mb-4">
                    <label class="form-label text-secondary small fw-bold">Key Features (One per line)</label>
                    <textarea name="features_raw" class="form-control" rows="6">{{ old('features_raw', $project->features_raw) }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Update Project</button>
            </div>
        </form>
    </div>
@endsection
