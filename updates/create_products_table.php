<?php namespace Bookrr\Product\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        if(Schema::hasTable('bookrr_products'))
        return;

        Schema::create('bookrr_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock')->nullable();
            $table->string('barcode')->nullable();
            $table->boolean('status')->nullable();
            $table->text('hash')->nullable();
            $table->text('features')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookrr_products');
    }
}
