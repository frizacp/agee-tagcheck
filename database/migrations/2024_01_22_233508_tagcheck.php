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
        Schema::create('tagcheck', function (Blueprint $table) {
        $table->bigIncrements('id'); // bigint unsigned auto_increment

        $table->integer('bib')->nullable();
        $table->string('lastName', 100)->nullable();
        $table->string('firstName', 100)->nullable();
        $table->string('gender', 7)->nullable();
        $table->string('type', 50)->nullable();
        $table->string('dob', 50)->nullable();
        $table->integer('age')->nullable();
        $table->string('contest', 50)->nullable();
        $table->string('race', 100)->nullable();
        $table->string('chipcode', 50)->nullable();

        $table->time('finishtime')->nullable();
        $table->time('chiptime')->nullable();
        $table->string('pace', 6)->nullable();

        $table->string('category', 50)->nullable(); // tambahan kolom

        $table->timestamps(); // created_at & updated_at
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagcheck');
    }
};
