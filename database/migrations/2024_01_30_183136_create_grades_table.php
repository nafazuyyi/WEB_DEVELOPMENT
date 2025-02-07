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
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40)->unique();
            // $table->unsignedInteger('class_type_id')->nullable()->unique();
            // $table->foreign('class_type_id')->references('id')->on('class_types')->onDelete('cascade');
            $table->tinyInteger('mark_from');
            $table->tinyInteger('mark_to');
            $table->string('remark', 40)->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('grades', function (Blueprint $table) {
        //     $table->dropForeign('grades_class_type_id_foreign');
        //     $table->dropColumn('class_type_id');
        // });
        Schema::dropIfExists('grades');
    }
};
