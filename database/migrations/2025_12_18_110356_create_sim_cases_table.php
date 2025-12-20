<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('sim_cases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('author');
            $table->string('organisation')->nullable();
            $table->json('tags')->nullable();
            $table->json('vorbereitung')->nullable();
            $table->json('fallbeispiel');
            $table->json('debriefing')->nullable();
            $table->json('files')->nullable();
        });
    }
};
