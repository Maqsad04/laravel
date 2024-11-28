@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary mb-4">Back to Questions</a>

    <!-- Question Card -->
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <h1 class="h4 mb-3">{{ $question->title }}</h1>
            <p class="text-muted small mb-2">
                Asked by <strong>{{ $question->user->name }}</strong>
                <span class="text-muted">• {{ $question->created_at->diffForHumans() }}</span>
            </p>
            <p class="card-text">{{ $question->description }}</p>

            @if (auth()->id() === $question->user_id)
                <!-- Toggle Comments Button -->
                <form action="{{ route('questions.toggleComments', $question) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-warning">
                        {{ $question->comments_disabled ? 'Enable Comments' : 'Disable Comments' }}
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Answers Section -->
    <h5 class="mb-3">Answers ({{ $question->answers->count() }})</h5>

    @foreach ($question->answers as $answer)
        <div class="card mb-3 shadow-sm {{ $answer->highlighted ? 'border-success' : '' }}">
            <div class="card-body">
                <p class="mb-1">
                    <strong>{{ $answer->user->name }}</strong>
                    <span class="text-muted small">• {{ $answer->created_at->diffForHumans() }}</span>
                </p>
                <p class="card-text">{{ $answer->content }}</p>

                @if (auth()->id() === $question->user_id)
                    <!-- Highlight Answer Button -->
                    <form action="{{ route('answers.highlight', $answer) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-success">
                            {{ $answer->highlighted ? 'Unhighlight' : 'Highlight' }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach

    <!-- Add Answer Form -->
    @if (!$question->comments_disabled)
        @auth
            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <h5 class="mb-3">Your Answer</h5>
                    <form action="{{ route('answers.store', $question) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control" rows="5" required placeholder="Write your answer here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Answer</button>
                    </form>
                </div>
            </div>
        @endauth
    @else
        <p class="text-muted">Commenting is disabled for this question.</p>
    @endif
</div>
@endsection