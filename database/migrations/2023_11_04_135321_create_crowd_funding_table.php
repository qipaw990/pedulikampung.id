<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrowdFundingTable extends Migration
{
    /**
     * Run the migrations.PPPP
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crowd_funding', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->enum('type', ["Waqaf", "Non Waqaf"]);
            $table->decimal('goal_amount', 10, 2);
            $table->decimal('current_amount', 10, 2)->default(0);
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('crowd_funding');
    }
}
