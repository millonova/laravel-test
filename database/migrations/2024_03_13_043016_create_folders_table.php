<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id('folder_id');
            $table->string('folder_name', 255);
            $table->unsignedBigInteger('parent_folder_id')->nullable();
            $table->unsignedBigInteger('owner_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('parent_folder_id')->references('folder_id')->on('folders')->onDelete('cascade');
            $table->foreign('owner_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('folders');
    }
};
