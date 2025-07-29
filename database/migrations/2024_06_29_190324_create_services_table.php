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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->json("name")->nullable();
            $table->json("description")->nullable();
            $table->json("slugs")->nullable();
            $table->json("images")->nullable();
            $table->json("additional_data")->nullable();
            $table->string("video")->nullable();
            $table->integer("order_number")->default(1);
            $table->boolean("status")->default(true);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references("id")->on("users")->onDelete('cascade');

            $table->unsignedBigInteger('setting_id')->nullable();
            $table->foreign('setting_id')->references("id")->on("settings")->onDelete('cascade');

            $table->unsignedBigInteger('top_service_id')->nullable();
            $table->foreign('top_service_id')->references("id")->on("services")->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
};
