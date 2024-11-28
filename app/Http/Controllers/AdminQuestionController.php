<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
{
    // Admin panelida savollarni ko‘rsatish
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    // Savolni yaratish uchun forma
    public function create()
    {
        return view('admin.questions.create');
    }

    // Yaratilgan savolni saqlash
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Question::create($request->all());
        return redirect()->route('admin.questions.index')->with('success', 'Savol muvaffaqiyatli qo‘shildi.');
    }

    // Savolni tahrirlash uchun forma
    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    // Tahrirlangan savolni saqlash
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $question->update($request->all());
        return redirect()->route('admin.questions.index')->with('success', 'Savol muvaffaqiyatli yangilandi.');
    }

    // Savolni o‘chirish
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Savol muvaffaqiyatli o‘chirildi.');
    }
}

