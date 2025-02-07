<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('my_class_id');
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('exam_id');
            $table->integer('exm')->nullable();
            $table->string('exm2')->nullable();
            $table->integer('tex1')->nullable();
            $table->tinyInteger('sub_pos')->nullable();
            $table->unsignedInteger('grade_id')->nullable();
            $table->string('year');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropForeign('marks_student_id_foreign');
            $table->dropColumn('student_id');
            $table->dropForeign('marks_my_class_id_foreign');
            $table->dropColumn('my_class_id');
            $table->dropForeign('marks_section_id_foreign');
            $table->dropColumn('section_id');
            $table->dropForeign('marks_subject_id_foreign');
            $table->dropColumn('subject_id');
            $table->dropForeign('marks_exam_id_foreign');
            $table->dropColumn('exam_id');
            $table->dropForeign('marks_grade_id_foreign');
            $table->dropColumn('grade_id');
        });
        Schema::dropIfExists('marks');
    }
};
