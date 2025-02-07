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
        Schema::create('my_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->unsignedInteger('class_type_id')->nullable();
            $table->foreign('class_type_id')->references('id')->on('class_types')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('my_classes', function (Blueprint $table) {
            $table->dropForeign('my_classes_class_type_id_foreign');
            $table->dropColumn('class_type_id');
        });
        Schema::dropIfExists('my_classes');
    }
};
