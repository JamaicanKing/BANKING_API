<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('customer_id')->unsigned();
            $table->integer('account_number');
            $table->integer('account_balance');
            $table->integer('account_type_id');
            $table->integer('currency_id');
            $table->integer('branch_id');
            $table->string('created_by');
            $table->string('updated_by');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('accounts');
    }
}
