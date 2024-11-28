<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        // Fetch all questions with their associated users and answers
        $questions = Question::with('user', 'answers')->latest()->get();

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $request->merge(['author' => auth()->user()->name]);

        // Create a new question for the authenticated user
        auth()->user()->questions()->create($request->all());

        return redirect()->route('questions.index')->with('success', 'Question created successfully!');
    }
    public function show($id)
    {
        // Fetch the question with its answers and the related user
        $question = Question::with(['user', 'answers.user'])->findOrFail($id);

        return view('questions.show', compact('question'));
    }

    public function toggleComments(Question $question)
    {
        // Ensure only the user who created the question can toggle comments
        if (auth()->id() !== $question->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Toggle the comments_disabled status
        $question->comments_disabled = !$question->comments_disabled;
        $question->save();

        return redirect()->route('questions.show', $question->id)
                        ->with('success', 'Commenting status updated successfully.');
    }
}