@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-certificate text-primary me-2"></i>Certifications</h5>
            <a href="{{ route('admin.certificates.create') }}" class="btn btn-blue btn-sm px-3 rounded-pill fw-bold">
                <i class="fa-solid fa-plus me-1"></i>Add Certificate
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-admin mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Issuer</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($certificates as $cert)
                        <tr>
                            <td>
                                @if($cert->image === 'CERTIFICATE_IMAGE' || empty($cert->image))
                                    <span class="badge bg-secondary">Placeholder</span>
                                @else
                                    <img src="{{ $cert->image }}" height="40" class="rounded border border-secondary" style="object-fit: cover; width: 60px;">
                                @endif
                            </td>
                            <td><span class="fw-bold text-white">{{ $cert->title }}</span></td>
                            <td>{{ $cert->issuer }}</td>
                            <td>{{ $cert->date ?? 'N/A' }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.certificates.edit', $cert->id) }}" class="btn btn-outline-warning btn-sm rounded-circle me-1" title="Edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this certificate?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-secondary">
                                <i class="fa-solid fa-circle-info fa-2x mb-2 d-block"></i>No certificates defined yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
