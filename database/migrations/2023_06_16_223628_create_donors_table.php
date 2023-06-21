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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('ward_id');
            $table->string('email')->unique();
            $table->string('whatsapp');
            $table->integer('age');
            $table->date('date');
            $table->string('blood');
            $table->timestamps();

            $table->foreign('ward_id')
                ->references('id')
                ->on('wards')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donors');
    }
};
