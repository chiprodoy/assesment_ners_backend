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

class NilaiSubKompetensiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_post_nilai_sub_kompetensi_api(): void
    {
        $user = User::find(2);

        Sanctum::actingAs($user);

        $subKompetensi=SubKompetensi::find(1);

        $mahasiswa=Mahasiswa::find(1);

        $response = $this->postJson('/api/nilai_subkompetensi/'.$subKompetensi->uuid,['mahasiswa_id'=>$mahasiswa->id,'nilai'=>4]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data'=>[
                '*'=>[
                    'id',
                    'sub_kompetensi_id',
                    'mahasiswa_id',
                    'dosen_id',
                    'nilai',
                ]
            ]
        ]
        );
    }
}
