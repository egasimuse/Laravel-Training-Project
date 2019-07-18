<?php

namespace Tests\Feature;

use App\Customer;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

class CustomersTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        Event::fake();
    }
    /** @test */
    public function only_logged_in_users_can_see_the_customers_list() {

        $response = $this->get('/customers')
            ->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_see_the_customers_list() {

        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/customers')
            ->assertOk();

    }

    /** @test */
    public function a_customer_can_be_added_through_the_form() {
        
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create([
            'email' => 'admin@abv.bg',
        ]));
        $response = $this->post('/customers', $this->data());

        $this->assertCount(1, Customer::all());
    }

     /** @test */
    public function a_name_is_required() {
        
        

        $this->actingAs(factory(User::class)->create([
            'email' => 'admin@abv.bg',
        ]));
        $response = $this->post('/customers', array_merge($this->data(), ['name' => '']));

        $response->assertSessionHasErrors('name');
        $this->assertCount(0, Customer::all());
    }

    /** @test */
    public function a_name_is_at_least_3_charecters() {

        $this->actingAs(factory(User::class)->create([
            'email' => 'admin@abv.bg',
        ]));
        $response = $this->post('/customers', array_merge($this->data(), ['name' => '']));

        $response->assertSessionHasErrors('name');
        $this->assertCount(0, Customer::all());
    }

    /** @test */
    public function an_email_is_required() {

        $this->actingAs(factory(User::class)->create([
            'email' => 'admin@abv.bg',
        ]));
        $response = $this->post('/customers', array_merge($this->data(), ['email' => '']));

        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Customer::all());
    }

    /** @test */
    public function a_valid_email_is_required() {

        $this->actingAs(factory(User::class)->create([
            'email' => 'admin@abv.bg',
        ]));
        $response = $this->post('/customers', array_merge($this->data(), ['email' => '']));

        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Customer::all());
    }

    public function data() {

        return [
            'name' => 'Test User',
            'email' => 'test@test.com',
            'active' => 1,
            'company_id' => 1
        ];
    }
}
