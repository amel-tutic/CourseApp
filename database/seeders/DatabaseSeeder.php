<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = User::factory()->create([
            'name' => 'Test Student',
            'email' => 'student@gmail.com',
            'password' => 'student',
            'role' => 'student'
        ]);

        $user = User::factory()->create([
            'name' => 'Test Professor',
            'email' => 'professor@gmail.com',
            'password' => 'professor',
            'role' => 'professor'
        ]);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'role' => 'admin'
        ]);

        Course::factory(6)->create([
            'user_id' => $user->id
        ]);

        $course = Course::factory()->create([
            'user_id' => '2',
            'title' => 'Kurs 1',
            'description' => 'opis kursa 1',
            'tags' => 'tag1, tag2, tag3',
            'duration' => '5'
        ]);

        $lesson = Lesson::factory()->create([
            'course_id' => '7',
            'title' => 'Lesson 1',
            'description' => 'descr for lesson 1',
            'content' => ' some content blah blah',
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '3x3',
            'answer' => '9',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'easy',  //1
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '3x6',
            'answer' => '18',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'easy', //2
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '3x9',
            'answer' => '27',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'easy', //3
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '3x8',
            'answer' => '24',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'easy', //4
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '3x12',
            'answer' => '36',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'medium', //1
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '3x10',
            'answer' => '30',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'medium', //2
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '3x2',
            'answer' => '6',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'medium', //3
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '3x1',
            'answer' => '3',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'medium', //4
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '4x9',
            'answer' => '36',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'medium', //5
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '4x5',
            'answer' => '20',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'medium', //6
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '4x2',
            'answer' => '8',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'hard', //1
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '4x10',
            'answer' => '40',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'hard', //2
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '5x12',
            'answer' => '60',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'hard', //3
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '5x10',
            'answer' => '50',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'hard', //4
            'points' => '5'
        ]);

        $question = Question::factory()->create([
            'course_id' => '7',
            'question' => '5x50',
            'answer' => '250',
            'option1' => '12',
            'option2' => '32',
            'option3' => '12',
            'difficulty' => 'hard', //5
            'points' => '5'
        ]);

    }
}
