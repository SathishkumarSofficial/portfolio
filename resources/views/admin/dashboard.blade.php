@extends('layouts.admin')

@section('content')
    <div class="row g-4 mb-5">
        <!-- Projects count card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-admin p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-secondary mb-0 fw-bold text-uppercase small">Total Projects</h6>
                    <div class="badge bg-primary-subtle text-primary p-2 fs-5"><i class="fa-solid fa-laptop-code"></i></div>
                </div>
                <h2 class="fw-bold mb-0 text-white">{{ $projectsCount }}</h2>
            </div>
        </div>

        <!-- Skills count card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-admin p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-secondary mb-0 fw-bold text-uppercase small">Skills Set</h6>
                    <div class="badge bg-success-subtle text-success p-2 fs-5"><i class="fa-solid fa-brain"></i></div>
                </div>
                <h2 class="fw-bold mb-0 text-white">{{ $skillsCount }}</h2>
            </div>
        </div>

        <!-- Experiences count card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-admin p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-secondary mb-0 fw-bold text-uppercase small">Job Experiences</h6>
                    <div class="badge bg-warning-subtle text-warning p-2 fs-5"><i class="fa-solid fa-briefcase"></i></div>
                </div>
                <h2 class="fw-bold mb-0 text-white">{{ $experiencesCount }}</h2>
            </div>
        </div>

        <!-- Unread messages card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-admin p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-secondary mb-0 fw-bold text-uppercase small">Unread Messages</h6>
                    <div class="badge bg-danger-subtle text-danger p-2 fs-5"><i class="fa-solid fa-envelope-open-text"></i></div>
                </div>
                <h2 class="fw-bold mb-0 text-white">{{ $unreadMessagesCount }}</h2>
            </div>
        </div>
    </div>

    <!-- Recent Inbox Message Table -->
    <div class="card card-admin p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-inbox me-2 text-primary"></i>Recent Contact Inbox</h5>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-blue btn-sm px-3 rounded-pill fw-bold">View Inbox</a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-admin mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Sent Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentMessages as $msg)
                        <tr>
                            <td>
                                <div class="fw-bold text-white">{{ $msg->name }}</div>
                                <span class="text-secondary small">{{ $msg->email }}</span>
                            </td>
                            <td>{{ $msg->subject ?? '(No Subject)' }}</td>
                            <td>{{ $msg->created_at->format('M d, Y h:i A') }}</td>
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-success-subtle text-success px-2 py-1">Read</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger px-2 py-1">New</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-outline-info btn-sm rounded-circle me-1" title="View Message">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
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
                                <i class="fa-solid fa-circle-info fa-2x mb-2 d-block"></i>No messages received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
