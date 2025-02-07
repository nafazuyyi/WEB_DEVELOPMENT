<?php

namespace App\Models;

use Eloquent;

class ExamRecord extends Eloquent
{
    protected $fillable = ['exam_id', 'my_class_id', 'student_id', 'section_id','t_comment', 'p_comment','j_comment', 'year', 'total', 'ave', 'class_ave', 'pos'];
}
