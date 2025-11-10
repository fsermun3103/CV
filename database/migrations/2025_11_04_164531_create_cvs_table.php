<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    function up(): void
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('surname', 70);
            $table->string('tel', 20);
            $table->string('email', 50)->unique();
            $table->date('birthdate');
            $table->decimal('avg_grade', 3, 2);
            $table->longText('experience');
            $table->longText('education');
            $table->longText('skills');
            $table->string('path', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
