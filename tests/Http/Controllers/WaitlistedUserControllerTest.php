<?php

namespace Tests\Http\Controllers;

use App\Models\WaitlistedUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WaitlistedUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_waitlisted_user_and_redirects()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'type' => 'tenant',
            'number_of_properties' => '1',
        ];

        $response = $this->post(route('waitlist.store'), $data);

        $response->assertRedirect(route('landing'));
        $this->assertDatabaseHas('waitlisted_users', $data);
    }

    public function test_store_requires_name()
    {
        $data = WaitlistedUser::factory()->make(['name' => ''])->toArray();

        $response = $this->post(route('waitlist.store'), $data);

        $response->assertSessionHasErrors('name');
        $this->assertDatabaseCount('waitlisted_users', 0);
    }

    public function test_store_requires_email()
    {
        $data = WaitlistedUser::factory()->make(['email' => ''])->toArray();

        $response = $this->post(route('waitlist.store'), $data);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('waitlisted_users', 0);
    }

    public function test_store_requires_valid_email()
    {
        $data = WaitlistedUser::factory()->make(['email' => 'not-an-email'])->toArray();

        $response = $this->post(route('waitlist.store'), $data);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('waitlisted_users', 0);
    }

    public function test_store_requires_unique_email()
    {
        WaitlistedUser::factory()->create(['email' => 'john@example.com']);

        $data = WaitlistedUser::factory()->make(['email' => 'john@example.com'])->toArray();

        $response = $this->post(route('waitlist.store'), $data);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('waitlisted_users', 1);
    }

    public function test_store_requires_type()
    {
        $data = WaitlistedUser::factory()->make(['type' => ''])->toArray();

        $response = $this->post(route('waitlist.store'), $data);

        $response->assertSessionHasErrors('type');
        $this->assertDatabaseCount('waitlisted_users', 0);
    }

    public function test_store_requires_number_of_properties()
    {
        $data = WaitlistedUser::factory()->make(['number_of_properties' => ''])->toArray();

        $response = $this->post(route('waitlist.store'), $data);

        $response->assertSessionHasErrors('number_of_properties');
        $this->assertDatabaseCount('waitlisted_users', 0);
    }
}
