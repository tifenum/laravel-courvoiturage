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
            $table->string('destination');
            $table->string('departure');
            $table->string('arrival');
            $table->string('vehicle_type');
            $table->string('brand');
            $table->decimal('price_per_person', 8, 2);
            $table->decimal('vehicle_price', 8, 2);
            $table->decimal('brand_price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navettes');
    }
}
