<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->json('management_fee');
            $table->float('minimum_fee_per_quarter');
            $table->string('fee_calculation_method');
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_email')->nullable();
            $table->date('agreement_date')->nullable();
            $table->date('agreement_expiry')->nullable();
            $table->date('update_effective_from')->nullable();
            $table->date('closing_date')->nullable();
            $table->string('closing_reason')->nullable();
            $table->string('closing_remarks')->nullable();
            $table->date('management_fee_last_calculated_at')->nullable();
            $table->boolean('is_current')->nullable();

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
        Schema::dropIfExists('portfolios');
    }
}
