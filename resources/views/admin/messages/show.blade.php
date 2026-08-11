@extends('layouts.admin')

@section('content')
    <div class="card card-admin p-4 col-md-10 mx-auto shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-secondary pb-3">
            <h5 class="fw-bold text-white mb-0"><i class="fa-solid fa-envelope-open text-primary me-2"></i>Read Message</h5>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i>Back to Inbox
            </a>
        </div>

        <div class="mb-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <span class="text-secondary small d-block">Sender Name</span>
                    <h5 class="text-white fw-bold">{{ $message->name }}</h5>
                </div>
                <div class="col-md-6">
                    <span class="text-secondary small d-block">Email Address</span>
                    <a href="mailto:{{ $message->email }}" class="text-primary fs-5">{{ $message->email }}</a>
                </div>
                <div class="col-md-6">
                    <span class="text-secondary small d-block">Phone Number</span>
                    <span class="text-white">{{ $message->phone ?? 'N/A' }}</span>
                </div>
                <div class="col-md-6">
                    <span class="text-secondary small d-block">Received Date</span>
                    <span class="text-white">{{ $message->created_at->format('M d, Y h:i A') }}</span>
                </div>
                <div class="col-12 mt-3">
                    <span class="text-secondary small d-block">Subject</span>
                    <h5 class="text-white fw-bold">{{ $message->subject ?? '(No Subject)' }}</h5>
                </div>
            </div>
        </div>

        <div class="p-4 rounded border border-secondary bg-dark text-white mb-4" style="white-space: pre-wrap; font-size: 1.1rem; line-height: 1.6;">
            {{ $message->message }}
        </div>

        <div class="d-flex justify-content-between pt-3 border-top border-secondary">
            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger rounded-pill px-4">
                    <i class="fa-solid fa-trash-can me-2"></i>Delete Message
                </button>
            </form>
            <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject ?? '') }}" class="btn btn-blue rounded-pill px-4">
                <i class="fa-solid fa-reply me-2"></i>Reply via Email
            </a>
        </div>
    </div>
@endsection
