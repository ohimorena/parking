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
        $table->id();
        $table->string('full_name');
        $table->string('sex');
        $table->string('phone')->unique();
        $table->text('address')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
