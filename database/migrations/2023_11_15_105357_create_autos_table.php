<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('autos', function (Blueprint $table) {
        $table->id();
        $table->string('brand');
        $table->string('model');
        $table->string('color');
        $table->string('reg_number')->unique();
        $table->boolean('is_parking');
        $table->unsignedBigInteger('cust_id');
        $table->foreign('cust_id')->references('id')->on('customers')
        ->onUpdate('cascade')->onDelete('cascade');
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
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
        Schema::dropIfExists('autos');
    }
}
