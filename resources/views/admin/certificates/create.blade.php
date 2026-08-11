@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-plus text-primary me-2"></i>Add Certificate</h5>
        
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Certificate Title</label>
                    <input type="text" name="title" class="form-control" placeholder="e.g. AWS Solutions Architect Associate" required value="{{ old('title') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Issuer / Authority</label>
                    <input type="text" name="issuer" class="form-control" placeholder="e.g. Kalvi Institute Private Limited" required value="{{ old('issuer') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Verification Link</label>
                    <input type="text" name="verify_link" class="form-control" placeholder="VERIFY_LINK_PLACEHOLDER" required value="{{ old('verify_link', 'VERIFY_LINK_PLACEHOLDER') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Date Received (Optional)</label>
                    <input type="text" name="date" class="form-control" placeholder="e.g. 2024" value="{{ old('date') }}">
                </div>
                
                <!-- Image upload options -->
                <div class="col-md-6 mb-4">
                    <label class="form-label text-secondary small fw-bold">Certificate Image (Upload)</label>
                    <input type="file" name="image_file" class="form-control">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label text-secondary small fw-bold">Image Placeholder String</label>
                    <input type="text" name="image_placeholder" class="form-control" placeholder="CERTIFICATE_IMAGE" value="{{ old('image_placeholder', 'CERTIFICATE_IMAGE') }}">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.certificates.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Save Certificate</button>
            </div>
        </form>
    </div>
@endsection
