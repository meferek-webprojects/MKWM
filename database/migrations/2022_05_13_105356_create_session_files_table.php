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
        Schema::create('session_files', function (Blueprint $table) {
            $table->id();
            $table->integer('session_id');
            $table->string('file');
            $table->boolean('locked')->default(false);
            $table->boolean('photoofmonth')->default(false);
            $table->boolean('favourite')->default(false);
            $table->string('centered')->nullable();
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
        Schema::dropIfExists('session_files');

        foreach(glob('public/images/photoshoots/*') as $directory){
            foreach(glob($directory.'/*') as $image){
                unlink($image);
            }
            rmdir($directory);
        }
    }
};
