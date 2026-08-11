@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-graduation-cap text-primary me-2"></i>Academic Background</h5>
            <a href="{{ route('admin.education.create') }}" class="btn btn-blue btn-sm px-3 rounded-pill fw-bold">
                <i class="fa-solid fa-plus me-1"></i>Add Education
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-admin mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Degree</th>
                        <th>Major</th>
                        <th>Institution</th>
                        <th>Duration</th>
                        <th>Score</th>
                        <th>Order</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($education as $edu)
                        <tr>
                            <td><span class="fw-bold text-white">{{ $edu->degree }}</span></td>
                            <td>{{ $edu->major }}</td>
                            <td>{{ $edu->institution }}</td>
                            <td>{{ $edu->duration }}</td>
                            <td><span class="badge bg-blue-dim text-blue">{{ $edu->score }}</span></td>
                            <td><span class="badge bg-secondary">{{ $edu->sort_order }}</span></td>
                            <td class="text-end">
                                <a href="{{ route('admin.education.edit', $edu->id) }}" class="btn btn-outline-warning btn-sm rounded-circle me-1" title="Edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.education.destroy', $edu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this education record?')">
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
                            <td colspan="7" class="text-center py-4 text-secondary">
                                <i class="fa-solid fa-circle-info fa-2x mb-2 d-block"></i>No education records defined yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
