@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card note-card shadow-sm rounded-lg">
        <div class="card-body">
            <h5 class="card-title">{{ Str::limit($note->title, 255, '...') ?: 'Untitled Note' }}</h5>
            <p class="card-text">{{ $note->content ?? '' }}</p>
            <small class="text-muted">
                Created: {{ $note->created_at->format('M d, Y H:i') }}
                @if ($note->updated_at != $note->created_at)
                    | Updated: {{$note->updated_at->format('M d, Y H:i') }}
                @endif
            </small>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning">Edit</a>
            <div class="d-flex">
                <a href="{{ route('notes.index') }}" class="btn btn-secondary mr-2">Back</a>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#deleteModal">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: white; color: black;">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this note?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection