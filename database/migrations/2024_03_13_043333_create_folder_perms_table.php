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
        Schema::create('folder_perms', function (Blueprint $table) {
            $table->id('permission_id');
            $table->unsignedBigInteger('folder_id');
            $table->string('folder_name', 255);
            $table->unsignedBigInteger('user_id');
            $table->enum('access_type', ['read', 'write', 'admin'])->default('read');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('folder_id')->references('folder_id')->on('folders')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folder_perms');
    }
};
