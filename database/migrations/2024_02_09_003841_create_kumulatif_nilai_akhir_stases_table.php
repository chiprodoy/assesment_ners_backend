<?php

use App\Models\Asesmen;
use App\Models\Dosen;
use App\Models\Kompetensi;
use App\Models\Mahasiswa;
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
        Schema::create('kumulatif_nilai_akhir_stases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Asesmen::class);
            $table->foreignIdFor(Kompetensi::class);
            $table->foreignIdFor(Mahasiswa::class);
            $table->foreignIdFor(Dosen::class);
            $table->decimal('nilai');
            $table->string('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kumulatif_nilai_akhir_stases');
    }
};
