@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-brain text-primary me-2"></i>Skills Inventory</h5>
            <a href="{{ route('admin.skills.create') }}" class="btn btn-blue btn-sm px-3 rounded-pill fw-bold">
                <i class="fa-solid fa-plus me-1"></i>Add New Skill
            </a>
        </div>

        @forelse($skills as $category => $list)
            <div class="mb-4">
                <h6 class="text-blue fw-bold border-bottom border-secondary pb-2 mb-3">{{ $category }}</h6>
                <div class="table-responsive">
                    <table class="table table-admin mb-0 align-middle">
                        <thead>
                            <tr>
                                <th>Skill Name</th>
                                <th>Category</th>
                                <th>Level</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $skill)
                                <tr>
                                    <td class="fw-bold text-white">{{ $skill->name }}</td>
                                    <td>{{ $skill->category }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="progress bg-black flex-grow-1" style="height: 6px; width: 100px;">
                                                <div class="progress-bar bg-blue" role="progressbar" style="width: {{ $skill->level }}%"></div>
                                            </div>
                                            <span class="small">{{ $skill->level }}%</span>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-outline-warning btn-sm rounded-circle me-1" title="Edit">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this skill?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="text-center py-4 text-secondary">
                <i class="fa-solid fa-circle-info fa-2x mb-2 d-block"></i>No skills defined yet.
            </div>
        @endforelse
    </div>
@endsection
