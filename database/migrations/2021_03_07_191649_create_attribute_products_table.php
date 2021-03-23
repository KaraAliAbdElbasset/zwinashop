<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('attribute_id')->constrained()->onDelete('cascade');
            $table->foreignId('attribute_value_id')->constrained()->onDelete('cascade');
            $table->string('attribute')->nullable();
            $table->string('value')->nullable();
            $table->decimal('price')->default(0);
            $table->string('image')->nullable();
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
        Schema::table('attribute_products', function (Blueprint $table) {
            $table->dropForeign('attribute_products_attribute_id_foreign');
            $table->dropForeign('attribute_products_product_id_foreign');
            $table->dropForeign('attribute_products_value_id_foreign');
        });
        Schema::dropIfExists('attribute_products');
    }
}
