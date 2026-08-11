@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-pencil text-primary me-2"></i>Edit Certificate</h5>
        
        <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Certificate Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $certificate->title) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Issuer / Authority</label>
                    <input type="text" name="issuer" class="form-control" value="{{ old('issuer', $certificate->issuer) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Verification Link</label>
                    <input type="text" name="verify_link" class="form-control" value="{{ old('verify_link', $certificate->verify_link) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label text-secondary small fw-bold">Date Received (Optional)</label>
                    <input type="text" name="date" class="form-control" value="{{ old('date', $certificate->date) }}">
                </div>
                
                <!-- Image upload options -->
                <div class="col-md-6 mb-4">
                    <label class="form-label text-secondary small fw-bold">Certificate Image (Upload)</label>
                    @if($certificate->image && str_starts_with($certificate->image, '/uploads/'))
                        <div class="mb-2"><img src="{{ $certificate->image }}" height="50" class="rounded border border-secondary"></div>
                    @endif
                    <input type="file" name="image_file" class="form-control">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label text-secondary small fw-bold">Image Placeholder String</label>
                    <input type="text" name="image_placeholder" class="form-control" value="{{ old('image_placeholder', $certificate->image) }}">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.certificates.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-blue rounded-pill px-4">Update Certificate</button>
            </div>
        </form>
    </div>
@endsection
