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
        Schema::create('ad_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('description');
            $table->json('images');
            $table->string('category');
            $table->json('prices');
            $table->float('promotional_price')->nullable();
            $table->integer('quantity');
            $table->enum('status',['active','expired','pending','aproved','archived']);
            $table->enum('type',['new','new_used','good','used']);
            $table->string('locate');
            $table->json('tags')->nullable();
            $table->string('contact_link');
            $table->timestamp('expired_at');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_products');
    }
};
