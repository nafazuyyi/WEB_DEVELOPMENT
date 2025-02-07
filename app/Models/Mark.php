<?php

namespace App\Models;

use App\User;
use Eloquent;

class Mark extends Eloquent
{
    protected $fillable = [ 'exm','exm2', 'tex1', 'sub_pos', 'grade_id', 'year', 'exam_id', 'subject_id', 'my_class_id', 'student_id', 'section_id'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
