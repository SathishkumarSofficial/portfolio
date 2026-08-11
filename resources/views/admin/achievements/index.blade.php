@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-trophy text-primary me-2"></i>Achievements</h5>
            <a href="{{ route('admin.achievements.create') }}" class="btn btn-blue btn-sm px-3 rounded-pill fw-bold">
                <i class="fa-solid fa-plus me-1"></i>Add Achievement
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-admin mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Title / Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($achievements as $ach)
                        <tr>
                            <td class="fw-bold text-white">{{ $ach->title }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.achievements.edit', $ach->id) }}" class="btn btn-outline-warning btn-sm rounded-circle me-1" title="Edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.achievements.destroy', $ach->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this achievement?')">
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
                            <td colspan="2" class="text-center py-4 text-secondary">
                                <i class="fa-solid fa-circle-info fa-2x mb-2 d-block"></i>No achievements defined yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
