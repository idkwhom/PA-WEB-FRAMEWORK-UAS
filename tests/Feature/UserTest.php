<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        $response = $this->post('/api/v1/auth', ['email' => "admin@mail.com", 'password' => '12345678']);

        $response->assertStatus(200);
    }
    public function test_user_get(): void
    {
        $user = \App\Models\User::factory()->create();

        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Make a request to the protected route with the token
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/v1/user');
    
        // Assert the response status
        $response->assertStatus(200);
    }
    public function test_user_post(): void
    {
        $user = \App\Models\User::factory()->create();

        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Make a request to the protected route with the token
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/v1/user', ['email' => 'test@mail.com', 'password' => '12345678', 'name' => 'test']);
    
        // Assert the response status
        $response->assertStatus(200);
    }
    public function test_user_update(): void
    {
        // Create a test user
        $user = \App\Models\User::factory()->create();
    
        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Data to update the user 
        $faker = \Faker\Factory::create();
        $updatedData = [
            'email' => $faker->unique()->safeEmail,
            'password' => $faker->password(8), // Minimum 8 characters
            'nama' => $faker->name,
        ];
    
        // Make a PUT or PATCH request to update the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->put("/api/v1/user/{$user->id}", $updatedData);
    
        // Assert the response status
        $response->assertStatus(200);
    
        // Optionally, check if the user data is updated in the database
    }
    public function test_user_delete(): void
    {
        // Create a test user
        $user = \App\Models\User::factory()->create();
    
        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Data to update the user 
    
        // Make a PUT or PATCH request to update the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete("/api/v1/user/{$user->id}");
    
        // Assert the response status
        $response->assertStatus(200);
    
        // Optionally, check if the user data is updated in the database
    }
    public function test_user_own_ukm(): void
    {
        // Create a test user
        $user = \App\Models\User::factory()->create();
    
        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Data to update the user 
    
        // Make a PUT or PATCH request to update the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get("/api/v1/user/{$user->id}/ukm");
    
        // Assert the response status
        $response->assertStatus(200);
    
        // Optionally, check if the user data is updated in the database
    }
    public function test_user_add_ukm(): void
    {
        // Create a test user
        $user = \App\Models\User::factory()->create();
    
        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Data to update the user 
        $faker = \Faker\Factory::create();
        $updatedData = [
            'user_id' => $user->id,
            'ukm_id' => $user->id, // Minimum 8 characters
            'status' => 0,
        ];
    
        // Make a PUT or PATCH request to update the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("/api/v1/user/{$user->id}/add_ukm", $updatedData);
    
        // Assert the response status
        $response->assertStatus(200);
    
        // Optionally, check if the user data is updated in the database
    }
    public function test_user_delete_ukm(): void
    {
        // Create a test user
        $user = \App\Models\User::factory()->create();
    
        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Data to update the user 
        $faker = \Faker\Factory::create();
    
        // Make a PUT or PATCH request to update the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("/api/v1/user/{$user->id}/delete_ukm");
    
        // Assert the response status
        $response->assertStatus(200);
    
        // Optionally, check if the user data is updated in the database
    }
    public function test_user_logout(): void
    {
        // Create a test user
        $user = \App\Models\User::factory()->create();
    
        // Generate a Sanctum token for the user
        $token = $user->createToken('Test Token')->plainTextToken;
    
        // Data to update the user 
        $faker = \Faker\Factory::create();
    
        // Make a PUT or PATCH request to update the user
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("/api/v1/logout");
    
        // Assert the response status
        $response->assertStatus(200);
    
        // Optionally, check if the user data is updated in the database
    }

}
