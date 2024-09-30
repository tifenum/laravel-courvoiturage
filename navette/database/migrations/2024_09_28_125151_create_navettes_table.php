<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavettesTable extends Migration // Change the class name here
{
    public function up()
    {
        Schema::create('navettes', function (Blueprint $table) { // Make sure the table name is plural if that's what you intend
            $table->id();
            $table->unsignedBigInteger('creator'); // Add the creator_id field
            $table->string('destination');
            $table->string('departure');
            $table->string('arrival');
            $table->string('vehicle_type');
            $table->string('brand');
            $table->decimal('price_per_person', 8, 2);
            $table->decimal('vehicle_price', 8, 2);
            $table->decimal('brand_price', 8, 2);
            $table->boolean('accepted')->nullable()->default(null); // Add the new nullable boolean field with default null
            // Foreign key constraint (optional, but recommended)
            $table->foreign('creator')->references('id')->on('users')->onDelete('cascade'); // Assuming users table has an id field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navettes');
    }
}
