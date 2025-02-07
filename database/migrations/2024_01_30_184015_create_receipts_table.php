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
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pr_id');
            $table->Integer('amt_paid');
            $table->Integer('balance');
            $table->string('year');
            $table->foreign('pr_id')->references('id')->on('payment_records')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropForeign('receipts_pr_id_foreign');
            $table->dropColumn('pr_id');
        });
        Schema::dropIfExists('receipts');
    }
};
