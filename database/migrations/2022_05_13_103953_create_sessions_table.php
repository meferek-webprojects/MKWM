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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('kind', ['photo', 'video', 'both']);
            $table->enum('type', ['public', 'private']);
            $table->text('description');
            $table->json('users_id');
            $table->integer('downloads')->default(0);
            $table->text('link')->nullable();
            $table->integer('place_id');
            $table->date('date');
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
        Schema::dropIfExists('sessions');
    }
};
