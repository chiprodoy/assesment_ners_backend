<?php

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\SubKompetensi;
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
        Schema::create('nilai_sub_kompetensis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SubKompetensi::class);
            $table->foreignIdFor(Mahasiswa::class);
            $table->foreignIdFor(Dosen::class);
            $table->decimal('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_sub_kompetensis');
    }
};
