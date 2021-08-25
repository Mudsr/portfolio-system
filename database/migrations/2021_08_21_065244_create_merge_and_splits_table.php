<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergeAndSplitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merge_and_splits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('portfolio_id')->constrained()->onDelete('cascade');
            $table->foreignId('deal_id')->constrained()->onDelete('cascade');
            $table->json('old_deal_ids');
            $table->string('action_type');

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
        Schema::dropIfExists('merge_and_splits');
    }
}
