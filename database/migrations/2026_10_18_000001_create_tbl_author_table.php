<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tblAuthor', function (Blueprint $t) {
            $t->id('AuthorID');
            $t->string('AuthorName');
            $t->string('Gender', 10)->nullable();
            $t->date('DOB')->nullable();
            $t->string('POB')->nullable();
            $t->string('Address')->nullable();
            $t->string('Phone', 30)->nullable();
            $t->string('Email')->nullable();
            $t->string('Photo')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tblAuthor');
    }
};
