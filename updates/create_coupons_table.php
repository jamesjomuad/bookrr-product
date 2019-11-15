<?php namespace Bookrr\Product\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        if(Schema::hasTable('bookrr_product_coupons'))
        return;

        Schema::create('bookrr_product_coupons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('code')->nullable();
            $table->integer('discount')->nullable();
            $table->char('unit',10)->nullable();
            $table->integer('min_cost')->nullable();
            $table->integer('num_usage')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookrr_product_coupons');
    }
}
