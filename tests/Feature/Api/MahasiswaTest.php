<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_access_api_matakuliah(): void
    {
        $user = User::find(1);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/mahasiswa');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data'=>[
                '*'=>['id','uuid','npm','nama']
            ]
        ]
        );
    }
}
