<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("customer_name")->nullable();
            $table->string("customer_address")->nullable();
            $table->string("bill_no")->nullable();
            $table->string("total_with_tax")->nullable();
            $table->string("total_without_tax")->nullable();
            $table->string("discount")->nullable();
            $table->string("grand_total")->nullable();
            $table->string("invoice_date")->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
