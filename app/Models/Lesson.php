<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'content', 'image', 'course_id'];

    //relation to course
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
