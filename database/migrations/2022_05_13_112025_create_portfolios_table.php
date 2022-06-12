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
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['event', 'product', 'plener', 'studio']);
            $table->enum('kind', ['photo', 'video', 'web', 'design']);
            $table->boolean('hero')->default(false);
            $table->boolean('typeheader')->default(false);
            $table->string('file');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
};
