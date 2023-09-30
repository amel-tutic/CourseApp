<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'answer', 'option1', 'option2', 'option3', 'difficulty',  'course_id',
        'attempts', 'successes'
    ];

    //relation to course
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
