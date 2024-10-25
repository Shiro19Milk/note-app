@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between mb-4">
        <h1 class="text-light">Notes</h1>
        <a href="{{ route('notes.create') }}" class="create-button">+</a>
    </div>
    
    <div class="row">
        @foreach($notes as $note)
        <div class="col-12 mb-3">
            <div class="card note-card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($note->title, 30, '...') ?: 'Untitled Note' }}</h5>
                    <p class="card-text">{{ Str::limit($note->content, 75, '...') }}</p>
                    <small class="text-muted">
                        Created: {{ $note->created_at->format('M d, Y H:i') }}
                        @if ($note->updated_at != $note->created_at)
                            | Updated: {{$note->updated_at->format('M d, Y H:i') }}
                        @endif
                    </small>
                </div>
                <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                    <a href="{{ route('notes.show', $note->id) }}" class="text-warning">View</a>
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick= "showAlert()"class="btn btn-link text-warning p-0">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection