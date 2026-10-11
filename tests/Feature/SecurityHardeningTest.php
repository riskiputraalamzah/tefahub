<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class SecurityHardeningTest extends TestCase
{
    public function test_public_responses_include_security_headers(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'DENY')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
            ->assertHeader('Permissions-Policy', 'camera=(), geolocation=(), microphone=()');
    }

    public function test_self_registration_is_disabled_by_default(): void
    {
        $this->assertFalse(Route::has('register'));
        $this->assertFalse(Route::has('register.post'));
    }

    public function test_ai_chat_is_rate_limited(): void
    {
        Http::fake();

        for ($attempt = 0; $attempt < 20; $attempt++) {
            $this->postJson(route('ai.chat'), ['message' => "Pertanyaan keamanan {$attempt}"])
                ->assertOk();
        }

        $this->postJson(route('ai.chat'), ['message' => 'Permintaan berikutnya'])
            ->assertTooManyRequests();
    }
}
