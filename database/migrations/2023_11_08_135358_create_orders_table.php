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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("no_telpon");
            $table->string("email");
            $table->integer("nominal");
            $table->text("pesan");
            $table->enum("status", ["confirm_user", "pending", "done"])->default("pending");
            $table->string("metode_pembayaran");
            $table->unsignedBigInteger('crowd_funding_id');
            $table->timestamps();
            $table->foreign('crowd_funding_id')->references('id')->on('crowd_funding')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
