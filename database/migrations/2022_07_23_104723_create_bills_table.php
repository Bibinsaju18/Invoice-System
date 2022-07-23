<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string("customer_id")->nullable();
            $table->string("bill_no")->nullable();
            $table->string("product")->nullable();
            $table->string("qty")->nullable();
            $table->string("price")->nullable();
            $table->string("tax")->nullable();
            $table->string("tax_amount")->nullable();
            $table->string("total")->nullable();
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
        Schema::dropIfExists('bills');
    }
}
