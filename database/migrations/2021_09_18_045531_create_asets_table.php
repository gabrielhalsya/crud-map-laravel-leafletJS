<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->text('pemilik');
            $table->text('alamat');
            $table->text('luas')->nullable($value=true);
            $table->text('jenis')->nullable($value=true);
            $table->text('lat');
            $table->text('lng');
            $table->text('g1')->nullable($value=true);
            $table->text('g2')->nullable($value=true);
            $table->text('g3')->nullable($value=true);
            $table->text('ket')->nullable($value=true);
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
        Schema::dropIfExists('asets');
    }
}
