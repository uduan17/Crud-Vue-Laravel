<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();   // en que fecha fue creado, en que fecha fue actualizado
            $table->softDeletes(); //en que fecha fue eliminado
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
};
