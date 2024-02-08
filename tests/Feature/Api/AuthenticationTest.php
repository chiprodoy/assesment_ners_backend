<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    //use RefreshDatabase;

    public function test_users_can_authenticate(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll('data.token','data.refresh_token','data.user')
        );
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(422);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll('message','errors')
        );
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);
        $response = $this->getJson('/api/logout');

        $response->assertStatus(200);

    }
}
