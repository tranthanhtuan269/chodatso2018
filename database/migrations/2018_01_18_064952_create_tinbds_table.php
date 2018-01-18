<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinbdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinbds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de', 255);
            $table->integer('nguoi_dang')->unsigned();
            $table->integer('loaiyeucau')->unsigned();
            $table->string('mo_ta', 1000);
            $table->string('images', 255);
            $table->integer('loaibds')->unsigned();
            $table->integer('tinh')->unsigned();
            $table->integer('huyen')->unsigned();
            $table->integer('phuong')->unsigned();
            $table->integer('duong')->unsigned();
            $table->integer('duan')->unsigned();
            $table->string('gia', 15);
            $table->integer('dien_tich');
            $table->string('dia_chi', 255);
            $table->integer('mat_tien');
            $table->integer('duong_vao');
            $table->integer('huong_nha')->unsigned();
            $table->integer('tang');
            $table->integer('phong_ngu');
            $table->integer('phong_khach');
            $table->integer('wc');
            $table->string('noi_that', 255);
            $table->integer('active');
            $table->integer('da_ban');
            $table->integer('vip');
            $table->integer('view')->default(0);
            $table->string('lat', 15);
            $table->string('lng', 15);
            $table->integer('numcall')->default(0);
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
        Schema::dropIfExists('tinbds');
    }
}
