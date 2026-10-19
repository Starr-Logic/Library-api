<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tblBook', function (Blueprint $t) {
            $t->id('BookID');
            $t->string('BookTitle');
            $t->unsignedBigInteger('BookTypeID');
            $t->date('PublishDate')->nullable();
            $t->integer('NumOfPages')->nullable();
            $t->integer('NumOfCopies')->nullable();
            $t->string('Edition')->nullable();
            $t->string('Publisher')->nullable();
            $t->string('BookSource')->nullable();
            $t->text('Remark')->nullable();
            $t->timestamps();

            $t->foreign('BookTypeID')->references('BookTypeID')->on('tblBookType');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tblBook');
    }
};
