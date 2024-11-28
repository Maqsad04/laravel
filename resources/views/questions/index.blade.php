@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">All Questions</h1>
        <a href="{{ route('questions.create') }}" class="btn btn-primary">Ask a Question</a>
    </div>

    @foreach ($questions as $question)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-1">
                    <a href="{{ route('questions.show', $question->id) }}" class="text-decoration-none text-dark">
                        {{ $question->title }}
                    </a>
                </h5>
                <p class="text-muted small mb-2">
                    Asked by <strong>{{ $question->user ? $question->user->name : 'Unknown User' }}</strong> 
                    <span class="text-muted">• {{ $question->created_at->diffForHumans() }}</span>
                </p>
                <p class="card-text text-truncate" style="max-width: 100%;">
                    {{ $question->description }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('questions.show', $question->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                    <span class="badge bg-info text-dark">{{ $question->answers->count() }} Answers</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection