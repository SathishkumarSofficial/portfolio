@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-plus text-primary me-2"></i>Add Project</h5>
        
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Project Name</label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. Ariviya Pet Products Website" required value="{{ old('name') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" placeholder="0" required value="{{ old('sort_order', 0) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Live Demo Link</label>
                    <input type="text" name="live_link" class="form-control" placeholder="PROJECT_LIVE_LINK" required value="{{ old('live_link', 'PROJECT_LIVE_LINK') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">GitHub Repository Link</label>
                    <input type="text" name="github_link" class="form-control" placeholder="PROJECT_GITHUB_LINK" required value="{{ old('github_link', 'PROJECT_GITHUB_LINK') }}">
                </div>

                <!-- Technologies (Comma separated) -->
                <div class="col-12 mb-3">
                    <label class="form-label text-secondary small fw-bold">Technologies Used (Comma-separated)</label>
                    <input type="text" name="technologies_raw" class="form-control" placeholder="e.g. Core PHP, MySQL, HTML, CSS, JavaScript" required value="{{ old('technologies_raw') }}">
                </div>

                <!-- Image options -->
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Project Image File (Upload)</label>
                    <input type="file" name="image_file" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Project Image Placeholder String</label>
                    <input type="text" name="image_placeholder" class="form-control" placeholder="PROJECT_IMAGE" value="{{ old('image_placeholder', 'PROJECT_IMAGE') }}">
                </div>

                <!-- Description -->
                <div class="col-12 mb-3">
                    <label class="form-label text-secondary small fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="4" required placeholder="Project overview..." >{{ old('description') }}</textarea>
                </div>

                <!-- Features list -->
                <div class="col-12 mb-4">
                    <label class="form-label text-secondary small fw-bold">Key Features (One per line)</label>
                    <textarea name="features_raw" class="form-control" rows="6" placeholder="Home&#10;Shop&#10;Wishlist&#10;Cart&#10;Checkout">{{ old('features_raw') }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Save Project</button>
            </div>
        </form>
    </div>
@endsection
