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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->integer('amount');
            $table->string('ref_no', 100)->unique();
            $table->string('method', 100)->nullable();
            $table->unsignedInteger('my_class_id')->nullable();
            $table->string('description')->nullable();
            $table->string('year');
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign('payments_my_class_id_foreign');
            $table->dropColumn('my_class_id');
        });
        Schema::dropIfExists('payments');
    }
};
