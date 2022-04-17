<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->enum('status',[1,2,3,4])->default(1);
            $table->float('price', 8, 2)->nullable();
            $table->integer('stock')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->unsignedBigInteger('category_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->nullOnDelete();;
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                        
            $table->timestamps();
        });
    }

    public function down()
    {
        
        Schema::dropIfExists('products');
    }
};
