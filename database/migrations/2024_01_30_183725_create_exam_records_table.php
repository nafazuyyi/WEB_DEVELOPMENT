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
        Schema::create('exam_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('my_class_id');
            $table->unsignedInteger('section_id');
            $table->integer('total')->nullable();
            $table->string('ave')->nullable();
            $table->string('class_ave')->nullable();
            $table->integer('pos')->nullable();
            $table->string('k')->nullable();
            $table->string('a')->nullable();
            $table->string('e')->nullable();
            $table->string('p_comment')->nullable();
            $table->string('t_comment')->nullable();
            $table->string('j_comment')->nullable();
            $table->string('year');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_records', function (Blueprint $table) {
            $table->dropForeign('exam_records_exam_id_foreign');
            $table->dropColumn('exam_id');
            $table->dropForeign('exam_records_my_class_id_foreign');
            $table->dropColumn('my_class_id');
            $table->dropForeign('exam_records_section_id_foreign');
            $table->dropColumn('section_id');
            $table->dropForeign('exam_records_student_id_foreign');
            $table->dropColumn('student_id');
        });
        Schema::dropIfExists('exam_records');
    }
};
