<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1516728224InquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('inquiries')) {
            Schema::create('inquiries', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('pax');
                $table->datetime('time_from')->nullable();
                $table->datetime('time_to')->nullable();
                $table->text('additional_information')->nullable();
                // $table->integer('rooms_id')->nullable()->unsigned();
                
                
                $table->timestamps('');
                $table->softDeletes();

                $table->integer('quotation_lists_id')->nullable()->unsigned();


                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
