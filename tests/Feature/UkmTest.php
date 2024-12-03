<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UkmTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_ukm(): void
    {
        $user = \App\Models\User::factory()->create();

        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Make a request to the protected route with the token
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/v1/ukm');
    
        // Assert the response status
        $response->assertStatus(200);
    }
    public function test_ukm_post(): void
    {
        $user = \App\Models\User::factory()->create();

        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Make a request to the protected route with the token
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/v1/ukm', ['nama_ukm' => 'test', 'kegiatan_ukm' => '12345678', 'tujuan_ukm' => 'test']);
    
        // Assert the response status
        $response->assertStatus(200);
    }
    public function test_ukm_update(): void
    {
        // Create a test user
        $user = \App\Models\User::factory()->create();
        $ukm = \App\Models\Ukm::factory()->create();
    
        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Data to update the user 
        $faker = \Faker\Factory::create();
        $updatedData = [
            'nama_ukm' => $faker->unique()->name,
            'kegiatan_ukm' => $faker->name, // Minimum 8 characters
            'tujuan_ukm' => $faker->name,
        ];
    
        // Make a PUT or PATCH request to update the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->put("/api/v1/ukm/{$ukm->id}", $updatedData);
    
        // Assert the response status
        $response->assertStatus(200);
    
        // Optionally, check if the user data is updated in the database
    }
    public function test_ukm_delete(): void
    {
        // Create a test user
        $user = \App\Models\User::factory()->create();
        $ukm = \App\Models\Ukm::factory()->create();
    
        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Data to update the user 
    
        // Make a PUT or PATCH request to update the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete("/api/v1/ukm/{$ukm->id}");
    
        // Assert the response status
        $response->assertStatus(200);
    
        // Optionally, check if the user data is updated in the database
    }
}
