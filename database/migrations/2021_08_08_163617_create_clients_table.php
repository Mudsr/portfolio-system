<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('portfolio_id')->nullable()->constrained()->onDelete('cascade');

            $table->string('address');
            $table->string('telephone');
            $table->string('email');
            $table->string('id_type');
            $table->string('id_no');
            $table->date('id_expiry');

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
        Schema::dropIfExists('clients');
    }
}
