<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();

            $table->foreignId('deal_id')->constrained()->onDelete('cascade');

            $table->string('area_name');
            $table->string('block');
            $table->string('property_value');
            $table->string('finance_amount');
            $table->string('pai_rent');
            $table->string('licensed_purpose');
            $table->string('application_no');
            $table->string('plot_area_size');

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
        Schema::dropIfExists('plots');
    }
}
