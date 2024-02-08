<?php

use App\Models\Kompetensi;
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
        Schema::create('sub_kompetensis', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Kompetensi::class);
            $table->string('nama_sub_kompetensi');
            $table->string('skor_penilaian')->default('0,1,2,3,4'); //0,1,2,3,4 //1-10
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kompetensis');
    }
};
