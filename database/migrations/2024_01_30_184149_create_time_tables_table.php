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
        Schema::create('time_table_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->unsignedInteger('my_class_id');
            $table->unsignedInteger('exam_id')->nullable();
            $table->string('year', 100);
            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
        });

        Schema::create('time_slots', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ttr_id');
            $table->tinyInteger('hour_from');
            $table->string('min_from', 2);
            $table->tinyInteger('hour_to');
            $table->string('min_to', 2);
            $table->string('time_from', 100);
            $table->string('time_to', 100);
            $table->string('full', 100);
            $table->timestamps();

            $table->foreign('ttr_id')->references('id')->on('time_table_records')->onDelete('cascade');
        });

        Schema::create('time_tables', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('ttr_id');
            $table->unsignedInteger('ts_id');
            $table->unsignedInteger('subject_id')->nullable();
            $table->string('exam_date', 50)->nullable();
            // $table->string('timestamp_from', 100);
            // $table->string('timestamp_to', 100);
            $table->string('day', 50)->nullable();
            $table->tinyInteger('day_num')->nullable();
            $table->timestamps();

            $table->foreign('ttr_id')->references('id')->on('time_table_records')->onDelete('cascade');
            $table->foreign('ts_id')->references('id')->on('time_slots')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('time_table_records', function (Blueprint $table) {
            $table->dropForeign('time_table_records_exam_id_foreign');
            $table->dropColumn('exam_id');
            $table->dropForeign('time_table_records_my_class_id_foreign');
            $table->dropColumn('my_class_id');
        });
        Schema::table('time_slots', function (Blueprint $table) {
            $table->dropForeign('time_slots_ttr_id_foreign');
            $table->dropColumn('ttr_id');
        });
        Schema::table('time_tables', function (Blueprint $table) {
            $table->dropForeign('time_tables_ttr_id_foreign');
            $table->dropColumn('ttr_id');
            $table->dropForeign('time_tables_ts_id_foreign');
            $table->dropColumn('ts_id');
            $table->dropForeign('time_tables_subject_id_foreign');
            $table->dropColumn('subject_id');
        });
        Schema::dropIfExists('time_tables');
        Schema::dropIfExists('time_slots');
        Schema::dropIfExists('time_table_records');
    }
};
