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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('initials')->nullable();
            $table->integer('role')->default(1);
            $table->string('email')->unique();
            $table->string('sex')->nullable();
            $table->text('description')->nullable();
            $table->string('phone')->nullable();
            $table->enum('theme', ['light', 'dark'])->default('light');
            $table->boolean('newsletter')->default(false);
            $table->string('avatar')->nullable();
            $table->string('centered')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
