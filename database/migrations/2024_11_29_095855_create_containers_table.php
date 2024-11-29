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
        Schema::create('containers', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name', 50); // Name (max 50 chars)
            $table->string('description', 200)->nullable(); // Description (max 200 chars, optional)
            $table->unsignedBigInteger('containertype'); // Foreign Key for ContainerTypes
            $table->enum('status', ['Online', 'Starting', 'Offline', 'Stopping', 'Installing']); // Status ENUM
            $table->timestamps(); // Created at and Updated at

            // Foreign Key Constraint
            $table->foreign('containertype')->references('id')->on('container_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('containers');
    }
};
