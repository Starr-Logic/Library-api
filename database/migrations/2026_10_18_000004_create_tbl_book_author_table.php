<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tblBookAuthor', function (Blueprint $t) {
            $t->unsignedBigInteger('BookID');
            $t->unsignedBigInteger('AuthorID');
            $t->date('AuthorDate')->nullable();
            $t->text('Remark')->nullable();
            $t->timestamps();

            $t->primary(['BookID', 'AuthorID']);
            $t->foreign('BookID')->references('BookID')->on('tblBook')->cascadeOnDelete();
            $t->foreign('AuthorID')->references('AuthorID')->on('tblAuthor')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tblBookAuthor');
    }
};
