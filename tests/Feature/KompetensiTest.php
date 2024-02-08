<?php

namespace Tests\Feature;

use App\Models\Asesmen;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class KompetensiTest extends TestCase
{
/**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_access_kompetensi_api(): void
    {
        $user = User::find(1);

        Sanctum::actingAs($user);

        $asesmen=Asesmen::find(1);

        $response = $this->getJson('/api/kompetensi/'.$asesmen->uuid);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data'=>[
                '*'=>[
                    'id',
                    'uuid',
                    'nama_kompetensi',
                    'asesmen'=>['uuid','nama_asesmen']
                ]
            ]
        ]
        );
    }
}
