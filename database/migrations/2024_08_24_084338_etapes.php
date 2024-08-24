<?php

use App\Models\Guide;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('etapes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('pieces_jointes')->nullable();
            $table->string('description')->nullable();
            $table->foreignIdFor(Guide::class)->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
