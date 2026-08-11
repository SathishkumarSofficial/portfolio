@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card card-admin p-4 shadow-sm">
                <div class="d-flex align-items-center mb-4">
                    <div class="badge bg-primary-subtle text-primary p-2 fs-5 me-3"><i class="fa-solid fa-user-gear"></i></div>
                    <h4 class="fw-bold text-white mb-0">Site Configuration & Profile Management</h4>
                </div>

                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row g-4">
                        <!-- Profile Card Details -->
                        <div class="col-md-6">
                            <h5 class="fw-bold text-blue border-bottom border-secondary pb-2 mb-3">Primary Info</h5>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $settings['name'] ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Designation</label>
                                <input type="text" name="designation" class="form-control" value="{{ old('designation', $settings['designation'] ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Rotating Typing Titles (One per line)</label>
                                <textarea name="titles_raw" class="form-control" rows="4" required>{{ old('titles_raw', $settings['titles_raw'] ?? '') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Bio Introduction</label>
                                <textarea name="bio" class="form-control" rows="5" required>{{ old('bio', $settings['bio'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Contact & Socials -->
                        <div class="col-md-6">
                            <h5 class="fw-bold text-blue border-bottom border-secondary pb-2 mb-3">Contact & Social Links</h5>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $settings['email'] ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $settings['phone'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Location</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location', $settings['location'] ?? '') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">GitHub Profile URL</label>
                                <input type="url" name="github_link" class="form-control" value="{{ old('github_link', $settings['github_link'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">LinkedIn Profile URL</label>
                                <input type="url" name="linkedin_link" class="form-control" value="{{ old('linkedin_link', $settings['linkedin_link'] ?? '') }}">
                            </div>
                        </div>

                        <!-- Image and Media Configuration -->
                        <div class="col-md-6 mt-5">
                            <h5 class="fw-bold text-blue border-bottom border-secondary pb-2 mb-3">Media Files & Assets</h5>
                            
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Profile Image</label>
                                @if(!empty($settings['profile_image']) && $settings['profile_image'] !== 'PROFILE_BACKGROUND_IMAGE')
                                    <div class="mb-2"><img src="{{ $settings['profile_image'] }}" height="60" class="rounded border border-secondary"></div>
                                @endif
                                <input type="file" name="profile_image" class="form-control">
                                <span class="text-secondary small">Leave blank to keep current image or default placeholder</span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Hero Banner Image</label>
                                @if(!empty($settings['hero_image']) && $settings['hero_image'] !== 'YOUR_IMAGE_PATH')
                                    <div class="mb-2"><img src="{{ $settings['hero_image'] }}" height="60" class="rounded border border-secondary"></div>
                                @endif
                                <input type="file" name="hero_image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">About Section Image</label>
                                @if(!empty($settings['about_image']) && $settings['about_image'] !== 'ABOUT_IMAGE')
                                    <div class="mb-2"><img src="{{ $settings['about_image'] }}" height="60" class="rounded border border-secondary"></div>
                                @endif
                                <input type="file" name="about_image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Resume File (PDF)</label>
                                @if(!empty($settings['resume_link']) && $settings['resume_link'] !== 'YOUR_RESUME_LINK')
                                    <div class="mb-2"><span class="badge bg-secondary p-2"><i class="fa-solid fa-file-pdf me-2"></i>{{ basename($settings['resume_link']) }}</span></div>
                                @endif
                                <input type="file" name="resume_file" class="form-control">
                            </div>
                        </div>

                        <!-- SEO Metadata Configuration -->
                        <div class="col-md-6 mt-5">
                            <h5 class="fw-bold text-blue border-bottom border-secondary pb-2 mb-3">SEO & Analytics Meta</h5>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">SEO Page Title</label>
                                <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title', $settings['seo_title'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">SEO Description</label>
                                <textarea name="seo_description" class="form-control" rows="3">{{ old('seo_description', $settings['seo_description'] ?? '') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">SEO Keywords (Comma separated)</label>
                                <input type="text" name="seo_keywords" class="form-control" value="{{ old('seo_keywords', $settings['seo_keywords'] ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">Google Analytics Measurement ID</label>
                                <input type="text" name="google_analytics_id" class="form-control" value="{{ old('google_analytics_id', $settings['google_analytics_id'] ?? '') }}" placeholder="G-XXXXXX">
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-4 pt-3 border-top border-secondary">
                        <button type="submit" class="btn btn-blue px-5 py-3 rounded-pill fw-bold">
                            <i class="fa-solid fa-circle-check me-2"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
