<?php

namespace Tests\Feature\Api;

use App\Models\Kompetensi;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SubKompetensiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_access_sub_kompetensi_api(): void
    {
        $user = User::find(1);

        Sanctum::actingAs($user);

        $kompetensi=Kompetensi::find(1);

        $response = $this->getJson('/api/subkompetensi/'.$kompetensi->uuid);
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
