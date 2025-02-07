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
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('from_class');
            $table->unsignedInteger('from_section');
            $table->unsignedInteger('to_class');
            $table->unsignedInteger('to_section');
            $table->tinyInteger('grad');
            $table->string('from_session');
            $table->string('to_session');
            $table->string('status');
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('from_class')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('to_class')->references('id')->on('my_classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropForeign('promotions_student_id_foreign');
            $table->dropColumn('student_id');
            $table->dropForeign('promotions_from_section_foreign');
            $table->dropColumn('from_section');
            $table->dropForeign('promotions_to_section_foreign');
            $table->dropColumn('to_section');
            $table->dropForeign('promotions_from_class_foreign');
            $table->dropColumn('from_class');
            $table->dropForeign('promotions_to_class_foreign');
            $table->dropColumn('to_class');
        });
        Schema::dropIfExists('promotions');
    }
};
