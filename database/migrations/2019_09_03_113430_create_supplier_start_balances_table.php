<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierStartBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_start_balances', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('supplier_id');
            $table->text('desc');
            $table->string('date');
            $table->string('payment_type');
            $table->string('depet_value');
            $table->string('invoice_id')->nullable();
            $table->string('total_balance');

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
        Schema::dropIfExists('supplier_start_balances');
    }
}
