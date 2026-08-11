@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4">
        <h5 class="fw-bold text-white mb-4"><i class="fa-solid fa-inbox text-primary me-2"></i>Contact Messages Inbox</h5>

        <div class="table-responsive">
            <table class="table table-admin mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Sender Info</th>
                        <th>Subject</th>
                        <th>Date Received</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="{{ !$msg->is_read ? 'table-active border-start border-primary border-3' : '' }}">
                            <td>
                                <div class="fw-bold text-white">{{ $msg->name }}</div>
                                <span class="text-secondary small">{{ $msg->email }}</span>
                                @if($msg->phone)
                                    <div class="text-secondary small-text"><i class="fa-solid fa-phone me-1"></i>{{ $msg->phone }}</div>
                                @endif
                            </td>
                            <td><span class="{{ !$msg->is_read ? 'fw-bold text-white' : '' }}">{{ $msg->subject ?? '(No Subject)' }}</span></td>
                            <td>{{ $msg->created_at->format('M d, Y h:i A') }}</td>
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-success-subtle text-success px-2 py-1">Read</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger px-2 py-1">New</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-outline-info btn-sm rounded-circle me-1" title="Read Message">
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
                                <i class="fa-solid fa-envelope-open-text fa-2x mb-2 d-block"></i>No messages received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
