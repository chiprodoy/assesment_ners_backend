<?php

namespace Tests\Feature\Api;

use App\Models\Kompetensi;
use App\Models\Mahasiswa;
use App\Models\SubKompetensi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class NilaiSubKompetenstiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_post_nilai_sub_kompetensi_api(): void
    {
        $user = User::find(1);

        Sanctum::actingAs($user);

        $subKompetensi=SubKompetensi::find(1);

        $mahasiswa=Mahasiswa::find(1);

        $response = $this->postJson('/api/nilai_subkompetensi/'.$subKompetensi->uuid);
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data'=>[
                '*'=>[
                    'id',
                    'uuid',
                    'nama_sub_kompetensi',
                    'skor_penilaian',
                    'kompetensi'=>['uuid','nama_kompetensi']
                ]
            ]
        ]
        );
    }
}
