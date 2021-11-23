<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('id_transaction');
            $table->timestamp('transfer_date');
            $table->string('slip_transfer');
            $table->decimal('payment');
            $table->decimal('total_bill');
            $table->unsignedInteger('id_payment_type');
            $table->string('notes');
            $table->string('confirmation_status');
            $table->string('updatedby');
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
        Schema::dropIfExists('payments');
    }
}
