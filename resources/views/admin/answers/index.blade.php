// resources/views/admin/answers/index.blade.php

@extends('layouts.admin')

@section('content')
    <h1>Javoblar</h1>
    <a href="{{ route('admin.answers.create') }}">Yangi Javob Qo‘shish</a>
    <ul>
        @foreach ($answers as $answer)
            <li>{{ $answer->body }} 
                <form action="{{ route('admin.answers.destroy', $answer) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">O‘chirish</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
