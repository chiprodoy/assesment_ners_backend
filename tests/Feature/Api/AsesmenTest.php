<?php

namespace Tests\Feature\Api;

use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AsesmenTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_access_asesmen_api(): void
    {
        $user = User::find(1);

        Sanctum::actingAs($user);

        $matakuliah=MataKuliah::find(1);

        $response = $this->getJson('/api/asesmen/'.$matakuliah->uuid);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data'=>[
                '*'=>[
                    'id',
                    'uuid',
                    'nama_asesmen',
                    'mata_kuliah'=>['kode_mata_kuliah','nama_mata_kuliah']
                ]
            ]
        ]
        );
    }
}
