<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Stack Overflow</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Stack Overflow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Questions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tags</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mt-4">
        <div class="jumbotron bg-light p-5 rounded">
            <h1 class="display-4">Welcome to Stack Overflow</h1>
            <p class="lead">A public platform to find and share programming knowledge with a community of developers.</p>
        </div>

        <!-- Questions Section -->
        <div class="mt-4">
            <h2 class="mb-3">Latest Questions</h2>
            <div class="list-group">
                @foreach ($questions as $question)
                    <a href="#" class="list-group-item list-group-item-action">
                        <h5 class="mb-1 text-primary">{{ $question->title }}</h5>
                        <p class="mb-1">{{ $question->description }}</p>
                        <small>Asked by <strong>{{ $question->author }}</strong> {{ $question->created_at->diffForHumans() }} · {{ $question->answers_count }} answers</small>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        &copy; 2024 Stack Overflow Clone. All rights reserved.
    </footer>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>