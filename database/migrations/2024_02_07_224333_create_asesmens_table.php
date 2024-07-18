<?php

use App\Models\MataKuliah;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asesmens', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(MataKuliah::class);
            $table->string('nama_asesmen');
            $table->string('sumber_nilai1');
            $table->string('sumber_nilai2');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesmens');
    }
};
