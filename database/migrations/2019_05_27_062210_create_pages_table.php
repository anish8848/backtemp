<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('sub_description')->nullable();
            $table->string('meta_key')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('has_sub_content')->nullable();
            $table->enum('is_active',array('yes','no'))->nullable()->default('no');
            $table->string('image')->nullable();
            $table->integer('order')->nullable();
            $table->string('display_type')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('last_updated_by')->nullable();
            $table->integer('last_deleted_by')->nullable();
            $table->enum('is_deleted',array('yes','no'))->nullable()->default('no');
            $table->timestamps('deleted_at');
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
        Schema::dropIfExists('pages');
    }
}
