<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenewalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('renewals', function (Blueprint $table) {
        //     $table->id();

        //     $table->foreignId('portfolio_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
        //     $table->foreignId('plot_id')->constrained()->onDelete('cascade');
        //     $table->date('renewed_at')->nullable();

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('renewals');
    }
}
