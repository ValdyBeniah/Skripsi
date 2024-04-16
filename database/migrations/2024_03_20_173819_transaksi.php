<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi')->unique();
            $table->string('name');
            $table->date('date');
            $table->string('pickup_address');
            $table->string('destination_address');
            $table->string('barang');
            $table->string('jenis');
            $table->bigInteger('truk');
            $table->bigInteger('weight');
            $table->bigInteger('phone');
            $table->decimal('total', 15, 2);
            $table->string('tracking');
            $table->boolean('is_completed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
