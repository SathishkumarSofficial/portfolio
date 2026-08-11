@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-laptop-code text-primary me-2"></i>Projects Inventory</h5>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-blue btn-sm px-3 rounded-pill fw-bold">
                <i class="fa-solid fa-plus me-1"></i>Add Project
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-admin mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Project Name</th>
                        <th>Technologies</th>
                        <th>Sort Order</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $proj)
                        <tr>
                            <td>
                                @if($proj->image === 'PROJECT_IMAGE' || empty($proj->image))
                                    <span class="badge bg-secondary">Placeholder</span>
                                @else
                                    <img src="{{ $proj->image }}" height="40" class="rounded border border-secondary" style="object-fit: cover; width: 60px;">
                                @endif
                            </td>
                            <td><span class="fw-bold text-white">{{ $proj->name }}</span></td>
                            <td>
                                @foreach($proj->technologies ?? [] as $tech)
                                    <span class="badge bg-dark-card border border-secondary text-blue text-uppercase px-2 py-1 small mb-1">{{ $tech }}</span>
                                @endforeach
                            </td>
                            <td><span class="badge bg-secondary">{{ $proj->sort_order }}</span></td>
                            <td class="text-end">
                                <a href="{{ route('admin.projects.edit', $proj->id) }}" class="btn btn-outline-warning btn-sm rounded-circle me-1" title="Edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $proj->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project record?')">
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
                                <i class="fa-solid fa-circle-info fa-2x mb-2 d-block"></i>No project items defined yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
