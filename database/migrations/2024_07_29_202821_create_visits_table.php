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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();

            $table->string("ip_address")->nullable();
            $table->string('url')->nullable();
            $table->json("meta")->nullable();
            $table->boolean("status")->default(true);

            $table->unsignedBigInteger('setting_id')->nullable();
            $table->foreign('setting_id')->references("id")->on("settings")->onDelete('cascade');

            $table->unsignedBigInteger('element_id')->nullable();
            $table->string("element_type")->nullable();
            // blog, service,

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references("id")->on("users")->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
