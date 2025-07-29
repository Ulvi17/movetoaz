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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();

            $table->json("user_info")->nullable();
            $table->string("ip_address")->nullable();
            $table->json("meta")->nullable();
            $table->unsignedBigInteger('setting_id')->nullable();
            $table->foreign('setting_id')->references("id")->on("settings")->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
