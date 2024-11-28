<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;

class AdminAnswerController extends Controller
{
    // Admin panelida javoblarni ko‘rsatish
    public function index()
    {
        $answers = Answer::all(); // Barcha javoblarni olish
        return view('admin.answers.index', compact('answers'));
    }

    // Javobni yaratish uchun forma
    public function create()
    {
        return view('admin.answers.create');
    }

    // Yaratilgan javobni saqlash
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'question_id' => 'required|exists:questions,id',
        ]);

        Answer::create($request->all());
        return redirect()->route('admin.answers.index')->with('success', 'Javob muvaffaqiyatli qo‘shildi.');
    }

    // Javobni tahrirlash uchun forma
    public function edit(Answer $answer)
    {
        return view('admin.answers.edit', compact('answer'));
    }

    // Tahrirlangan javobni saqlash
    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $answer->update($request->all());
        return redirect()->route('admin.answers.index')->with('success', 'Javob muvaffaqiyatli yangilandi.');
    }

    // Javobni o‘chirish
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('admin.answers.index')->with('success', 'Javob muvaffaqiyatli o‘chirildi.');
    }
}

