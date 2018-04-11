<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms',function(Blueprint $table){
            $table->foreign('room_types_id')
                ->references('id')->on('room_types')->onDelete('cascade');
        });

        // Schema::table('bookings',function(Blueprint $table){
        //     $table->foreign('rooms_id')
        //         ->references('id')->on('rooms')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('migrations');
    }
}
