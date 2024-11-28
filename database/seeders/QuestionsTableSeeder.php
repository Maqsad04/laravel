<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('questions')->insert([
            [
                'title' => 'How to center a div in CSS?',
                'description' => 'I am struggling with centering a div. Can anyone help?',
                'author' => 'JohnDoe',
                'answers_count' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'What is the difference between == and === in JavaScript?',
                'description' => 'I am confused about how == and === work in JavaScript.',
                'author' => 'Jane123',
                'answers_count' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How do I set up a Laravel project?',
                'description' => 'I am new to Laravel. How do I get started?',
                'author' => 'DevPro',
                'answers_count' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
