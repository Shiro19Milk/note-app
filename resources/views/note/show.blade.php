@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card note-card shadow-sm rounded-lg">
        <div class="card-body">
            <h5 class="card-title">{{ Str::limit($note->title, 255, '...') ?: 'Untitled Note' }}</h5>
            <p class="card-text">{{ Str::limit($note->content, 500, '...') }}</p>
            <small class="text-muted">
                Created: {{ $note->created_at->format('M d, Y H:i') }}
                @if ($note->updated_at != $note->created_at)
                    | Updated: {{$note->updated_at->format('M d, Y H:i') }}
                @endif
            </small>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection