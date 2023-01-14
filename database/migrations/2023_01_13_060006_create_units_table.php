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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_number')->unique();
            $table->foreignId('cluster_id')->constrained()->onDelete('cascade');
            $table->string('unit_tower')->nullable();
            $table->string('unit_floor');
            $table->string('unit_room');
            $table->enum('unit_type', config('enum.unit_type'));
            $table->string('floor_area')->nullable();
            $table->string('unit_association_fee');
            $table->string('unit_parking_fee');
            $table->enum('status', config('enum.unit_status'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
};
