<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_to_login_on_root_route()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function it_displays_the_dashboard_when_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    /** @test */
    public function it_allows_access_to_ofertas_index_route()
    {
        $response = $this->get(route('ofertas.index'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_displays_noticias_vista()
    {
        $response = $this->get(route('vistanoticias'));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_stores_a_new_oferta_laboral()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'titulo' => 'Oferta Laboral Ejemplo',
            'descripcion' => 'Descripción de prueba para la oferta laboral.',
        ];

        $response = $this->post(route('ofertas.store'), $data);
        $response->assertRedirect(route('ofertas.index'));
    }

    /** @test */
    public function it_assigns_a_role_to_a_user()
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $user = User::factory()->create();
        $roleData = ['role' => 'admin'];

        $response = $this->post(route('users.assignRole', $user), $roleData);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_removes_a_role_from_a_user()
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $user = User::factory()->create();
        $roleData = ['role' => 'admin'];

        $response = $this->post(route('users.removeRole', $user), $roleData);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_freezes_or_unfreezes_a_user()
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $user = User::factory()->create();
        $response = $this->post(route('users.toggleFreeze', $user));
        $response->assertStatus(200);
    }

    /** @test */
    public function it_deletes_a_user()
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user));
        $response->assertRedirect(route('index'));
    }

    /** @test */
    public function it_displays_the_create_egresado_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('egresados.create'));
        $response->assertStatus(200);
    }
}