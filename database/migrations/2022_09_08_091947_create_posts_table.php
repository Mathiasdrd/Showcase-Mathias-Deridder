<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
            //eventueel later toevoegen, in een nieuwe migration
            //dit is slechts een reminder 
            //$table->string('image_source')->nullable();
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('src');
            $table->foreignId('user_id')->constrained();
            $table->string('tags');
            $table->string('description')->nullable();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->tinyInteger('is_image_owner');
            $table->string('creator')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
