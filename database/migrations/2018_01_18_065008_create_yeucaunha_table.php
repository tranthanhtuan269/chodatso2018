<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYeucaunhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeucaunha', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nguoi_dang')->unsigned();
            $table->integer('loaiyeucau');
            $table->integer('tam_tien');
            $table->integer('loaibds')->unsigned();
            $table->integer('tinh')->unsigned();
            $table->integer('huyen')->unsigned();
            $table->integer('phuong')->unsigned();
            $table->integer('duong')->unsigned();
            $table->integer('duan')->unsigned();
            $table->integer('mua_gap')->default(1);
            $table->integer('kinh_doanh')->default(1);
            $table->integer('dau_tu')->default(1);
            $table->integer('de_o')->default(1);
            $table->integer('dien_tich');
            $table->string('dia_chi',255);
            $table->integer('mat_tien');
            $table->integer('duong_vao');
            $table->integer('huong_nha');
            $table->integer('tang');
            $table->integer('phong_ngu');
            $table->integer('phong_khach');
            $table->integer('wc');
            $table->string('yeu_cau',500);
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
        Schema::dropIfExists('yeucaunha');
    }
}
