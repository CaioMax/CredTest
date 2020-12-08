<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("fk_owner")->unsigned();
            $table->foreign("fk_owner")->references("id")->on("owners")->onDelete("cascade");
            $table->bigInteger("fk_client")->unsigned();
            $table->foreign("fk_client")->references("id")->on("clients")->onDelete("cascade");
            $table->bigInteger("fk_propertie")->unsigned();
            $table->foreign("fk_propertie")->references("id")->on("properties")->onDelete("cascade");
            $table->date("dt_start");
            $table->date("dt_end");
            $table->decimal("admin_fee", 3,2);
            $table->decimal("rent_amount", 8,2);
            $table->decimal("condo_fee", 7,2);
            $table->decimal("iptu", 6,2);
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
        Schema::dropIfExists('contracts');
    }
}
