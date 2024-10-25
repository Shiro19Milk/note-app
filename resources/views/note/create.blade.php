@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Create Note</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" maxlength="255" oninput="checkTitleLength(this)">
            <small id="titleMaxChar" class="form-text text-muted">Max 255 characters.</small>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

<script>
    function checkTitleLength(input) {
        if (input.value.length >= 255) {
            input.value = input.value.slice(0, 255); 
        }
    }
</script>
@endsection