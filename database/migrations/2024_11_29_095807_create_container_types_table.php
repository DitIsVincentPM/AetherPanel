<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_types', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name', 50); // Name (max 50 chars)
            $table->json('json'); // JSON Field
            $table->string('docker_image'); // Docker Image (string)
            $table->string('image'); // Image (string)
            $table->timestamps(); // Created at and Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('container_types');
    }
};
