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
        Schema::create('tools_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('brand_id')->nullable();   
            $table->integer('category_id')->nullable();
              
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools_types');
    }
};
