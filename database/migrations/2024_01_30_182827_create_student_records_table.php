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
        Schema::create('student_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('my_class_id');
            $table->unsignedInteger('section_id');
            $table->string('adm_no', 30)->unique()->nullable();
            $table->string('father')->nullable(); // ortu
            $table->string('mother')->nullable(); // ortu
            // $table->unsignedInteger('my_parent_id')->nullable();
            $table->string('session');
            $table->string('year_admitted')->nullable();
            $table->tinyInteger('grad')->default(0);
            $table->string('grad_date')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            // $table->foreign('my_parent_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_records', function (Blueprint $table) {
            $table->dropForeign('student_records_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('student_records_my_class_id_foreign');
            $table->dropColumn('my_class_id');
            $table->dropForeign('student_records_section_id_foreign');
            $table->dropColumn('section_id');
            // $table->dropForeign('student_records_my_parent_id_foreign');
            // $table->dropColumn('my_parent_id');
        });
        Schema::dropIfExists('student_records');
    }
};
