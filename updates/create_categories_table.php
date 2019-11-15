<?php namespace Bookrr\Product\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        if(Schema::hasTable('bookrr_product_categories'))
        return;

        Schema::create('bookrr_product_categories', function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',50);
            $table->text('description')->nullable();
            $table->string('slug',50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookrr_product_categories');
    }
}
