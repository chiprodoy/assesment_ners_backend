<?php

use App\Models\Asesmen;
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
        Schema::create('kompetensis', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignIdFor(Asesmen::class);
            $table->string('nama_kompetensi'); // kognitif,psikomotrik,afektif,social
            $table->string('grup_kompetensi'); // Kompetensi::class;
            $table->decimal('persentase');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompetensis');
    }
};
