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
        Schema::create('payment_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('payment_id');
            $table->unsignedInteger('student_id');
            $table->string('ref_no', 100)->unique()->nullable();
            $table->integer('amt_paid')->nullable();
            $table->integer('balance')->nullable();
            $table->tinyInteger('paid')->default(0);
            $table->string('year');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_records', function (Blueprint $table) {
            $table->dropForeign('payment_records_payment_id_foreign');
            $table->dropColumn('payment_id');
            $table->dropForeign('payment_records_student_id_foreign');
            $table->dropColumn('student_id');
        });
        Schema::dropIfExists('payment_records');
    }
};
