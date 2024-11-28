// resources/views/admin/questions/index.blade.php

@extends('layouts.admin')

@section('content')
    <h1>Savollar</h1>
    <a href="{{ route('admin.questions.create') }}">Yangi Savol Qo‘shish</a>
    <ul>
        @foreach ($questions as $question)
            <li>{{ $question->title }} 
                <form action="{{ route('admin.questions.destroy', $question) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">O‘chirish</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
