<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->decimal('percentage', 5, 2);  // allows for discounts from 0.01% to 99.99%

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('set null');

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
        Schema::dropIfExists('discounts');
    }
};
