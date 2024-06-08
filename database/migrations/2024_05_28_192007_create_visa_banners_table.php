<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_banners', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('img')->nullable(TRUE);
            $table->string('img_ru')->nullable(TRUE);
            $table->string('img_en')->nullable(TRUE);
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('visa_banners');
    }
}
