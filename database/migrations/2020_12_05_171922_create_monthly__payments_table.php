<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly__payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("fk_contract")->unsigned();
            $table->foreign("fk_contract")->references("id")->on("contracts")->onDelete("cascade");
            $table->string("reference",7);
            $table->decimal("payment_value", 8,2);
            $table->boolean("payment_status");
            $table->decimal("transfer_value", 8,2);
            $table->boolean("transfer_status");
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
        Schema::dropIfExists('monthly__payments');
    }
}
