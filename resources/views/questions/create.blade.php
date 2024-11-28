@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h1 class="h2">Ask a Question</h1>
        <p class="text-muted">Be specific and imagine you’re asking a question to another person.</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Question Title</label>
                    <input type="text" id="title" name="title" class="form-control" required placeholder="Enter a descriptive title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Question Description</label>
                    <textarea id="description" name="description" class="form-control" rows="6" required placeholder="Provide as much detail as possible"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Question</button>
                <a href="{{ route('questions.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection