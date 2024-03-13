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
        Schema::create('images', function (Blueprint $table) {
            $table->id('image_id');
            $table->string('image_name', 255);
            $table->integer('file_size');
            $table->timestamp('uploaded_date')->default(now());
            $table->timestamp('modified_date')->default(now())->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('folder_id')->nullable();
            $table->enum('visibility', ['private', 'public'])->default('private');
            $table->unsignedBigInteger('last_modified_by');
            $table->string('image_location', 255)->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('folder_id')->references('folder_id')->on('folders')->onDelete('cascade');
            $table->foreign('last_modified_by')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
