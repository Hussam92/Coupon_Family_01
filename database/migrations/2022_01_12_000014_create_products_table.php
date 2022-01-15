<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('max_coupons_count')->nullable();
            $table->integer('max_offers_count')->nullable();
            $table->integer('max_newsletter_count')->nullable();
            $table->integer('max_promotions_count')->nullable();
            $table->integer('max_members_count')->nullable();
            $table->integer('max_newsletter_global')->nullable();
            $table->integer('max_promotions_global')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
