<?php namespace Bookrr\Travelrr\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateBookrrProductCategoryPivot extends Migration
{
    public function up()
    {
        if(Schema::hasTable('bookrr_product_category_pivot'))
        return;

        Schema::create('bookrr_product_category_pivot', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('product_id');
            $table->integer('category_id');
            $table->primary(['product_id','category_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('bookrr_product_category_pivot');
    }
}