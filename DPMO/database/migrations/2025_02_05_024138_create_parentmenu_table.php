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
        Schema::create('parentmenu', function (Blueprint $table) {
            $table->id('parentid');
            $table->string('parentmenu', 250);
            $table->string('icon', 250);
            $table->string('url', 250)->nullable();
            $table->integer('orderno');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parentmenu');
    }
};
