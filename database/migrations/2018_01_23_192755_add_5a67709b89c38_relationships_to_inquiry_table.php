<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a67709b89c38RelationshipsToInquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inquiries', function(Blueprint $table) {
            if (!Schema::hasColumn('inquiries', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '110461_5a676fa2321c7')->references('id')->on('customers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('inquiries', 'rooms_id')) {
                $table->integer('rooms_id')->unsigned()->nullable();
                $table->foreign('rooms_id', '110461_5a676fa239ffd')->references('id')->on('rooms')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inquiries', function(Blueprint $table) {
            
        });
    }
}
