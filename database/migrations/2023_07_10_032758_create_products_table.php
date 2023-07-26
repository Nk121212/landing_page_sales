<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->string('photo');
            $table->string('embed');
            $table->string('brosur');
            $table->unsignedBigInteger('categories_id');
            $table->string('slogan');
            $table->integer('total_detail');
            $table->unsignedBigInteger('id_type');
            $table->timestamps();

            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_type')->references('id')->on('master_type')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['categories_id', 'id_type']);
            $table->dropColumn('categories_id', 'id_type');
        });

        Schema::dropIfExists('products');
    }
}
