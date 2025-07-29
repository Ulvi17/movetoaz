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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->json("name")->nullable();
            $table->json("description")->nullable();
            $table->json("address")->nullable();
            $table->json("social_media")->nullable();
            $table->json("logos")->nullable();
            $table->json("langs")->nullable();
            $table->json("additional_data")->nullable();
            $table->string("slug")->nullable();
            $table->string("domain")->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references("id")->on("users")->onDelete('cascade');

            // estate,car
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
