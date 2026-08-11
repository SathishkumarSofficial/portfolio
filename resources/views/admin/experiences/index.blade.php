@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-briefcase text-primary me-2"></i>Work Experiences</h5>
            <a href="{{ route('admin.experiences.create') }}" class="btn btn-blue btn-sm px-3 rounded-pill fw-bold">
                <i class="fa-solid fa-plus me-1"></i>Add Experience
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-admin mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Designation</th>
                        <th>Duration</th>
                        <th>Order</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $exp)
                        <tr>
                            <td><span class="fw-bold text-white">{{ $exp->company }}</span></td>
                            <td>{{ $exp->designation }}</td>
                            <td>{{ $exp->duration }}</td>
                            <td><span class="badge bg-secondary">{{ $exp->sort_order }}</span></td>
                            <td class="text-end">
                                <a href="{{ route('admin.experiences.edit', $exp->id) }}" class="btn btn-outline-warning btn-sm rounded-circle me-1" title="Edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.experiences.destroy', $exp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this experience record?')">
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
                                <i class="fa-solid fa-circle-info fa-2x mb-2 d-block"></i>No experience items defined yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
