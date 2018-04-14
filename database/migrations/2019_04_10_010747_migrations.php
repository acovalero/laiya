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

        // Foreign keys of Rooms to have Room Types
        Schema::table('rooms',function(Blueprint $table){
            $table->foreign('room_types_id')
                ->references('id')->on('room_types')->onDelete('cascade');
            $table->foreign('room_statuses_id')
                ->references('id')->on('room_statuses')->onDelete('cascade');
        });

        //Inquiries
        Schema::table('inquiries', function (Blueprint $table) {
            $table->foreign('quotation_lists_id')
                ->references('id')->on('quotation_lists')->onDelete('cascade');
        });

        //Quotation
        Schema::table('quotations', function (Blueprint $table) {
            // $table->foreign('room_lists_id')
            //     ->references('id')->on('room_lists')->onDelete('cascade');
            // $table->foreign('fee_lists_id')
            //     ->references('id')->on('fee_lists')->onDelete('cascade');
            $table->foreign('rooms_id')
                ->references('id')->on('rooms')->onDelete('cascade');
        });

        //Quotation List
        Schema::table('quotation_lists', function (Blueprint $table) {
            $table->foreign('quotations_id')
                ->references('id')->on('quotations')->onDelete('cascade');
        });

        //Fee List
        Schema::table('fee_lists', function (Blueprint $table) {
            $table->foreign('fees_id')
                ->references('id')->on('fees')->onDelete('cascade');
        });

        //Fee Type List
        // Schema::table('fees', function (Blueprint $table) {
        //     $table->foreign('fee_types_id')
        //         ->references('id')->on('fee_types')->onDelete('cascade');
        // });

        //Booking
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('inquiries_id')
                ->references('id')->on('inquiries')->onDelete('cascade');
        });

        //Room List
        Schema::table('room_lists', function (Blueprint $table) {
            $table->foreign('rooms_id')
                ->references('id')->on('rooms')->onDelete('cascade');
        });
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
