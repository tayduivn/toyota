<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('product_name',255);
            $table->string('product_code',100)->nullable(true);
            $table->string('product_title',255)->nullable(true);
            $table->string('title',1000)->nullable(true);
            $table->string('meta_keyword',1000)->nullable(true);
            $table->integer('vendor_id')->nullable(true);
            $table->string('product_number_of_seat')->nullable(true);
            $table->string('product_design')->nullable(true);
            $table->string('product_fuel')->nullable(true);
            $table->string('product_origin')->nullable(true);
            $table->string('product_other_information')->nullable(true);
            $table->integer('product_type_id')->nullable(true);
            $table->bigInteger('product_price')->default(0)->nullable(true);
            $table->bigInteger('product_cost_price')->default(0)->nullable(true);
            $table->bigInteger('product_compare_price')->default(0)->nullable(true);
            $table->integer('product_sale_percent')->default(0)->nullable(true);
            $table->string('product_description',1000)->nullable(true);
            $table->text('product_content')->nullable(true);
            $table->string('product_image',255)->nullable(true);
            $table->bigInteger('product_qty')->default(0)->nullable(true);
            $table->bigInteger('qty_sale_order')->default(0)->nullable(true);
            $table->string('slug',255)->nullable(true);
            $table->integer('blog_id')->nullable(true);
            $table->dateTime('start_date_show_promotion')->nullable(true);
            $table->dateTime('end_date_show_promotion')->nullable(true);
            $table->longText('content_promotion')->nullable(true);
            $table->integer('is_public')->default(0);
            $table->integer('is_delete')->default(0);
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
        Schema::dropIfExists('products');
    }
}
