<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('category_product',static function (Blueprint $table) {
            $table->foreignId('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->primary(['category_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('category_product', static function (Blueprint $table) {
            $table->dropForeign('category_product_product_id_foreign');
            $table->dropForeign('category_product_category_id_foreign');
        });
        Schema::dropIfExists('category_product');
    }
}
