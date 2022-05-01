<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cve;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CveController
 */
class CveControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $cves = Cve::factory()->count(3)->create();

        $response = $this->get(route('cve.index'));

        $response->assertOk();
        $response->assertViewIs('cve.index');
        $response->assertViewHas('cves');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('cve.create'));

        $response->assertOk();
        $response->assertViewIs('cve.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CveController::class,
            'store',
            \App\Http\Requests\CveStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $cve_code = $this->faker->word;
        $cvss = $this->faker->numberBetween(-10000, 10000);
        $nessus_cod = $this->faker->word;
        $nmap_cod = $this->faker->word;
        $en_description = $this->faker->text;
        $es_description = $this->faker->text;

        $response = $this->post(route('cve.store'), [
            'cve_code' => $cve_code,
            'cvss' => $cvss,
            'nessus_cod' => $nessus_cod,
            'nmap_cod' => $nmap_cod,
            'en_description' => $en_description,
            'es_description' => $es_description,
        ]);

        $cves = Cve::query()
            ->where('cve_code', $cve_code)
            ->where('cvss', $cvss)
            ->where('nessus_cod', $nessus_cod)
            ->where('nmap_cod', $nmap_cod)
            ->where('en_description', $en_description)
            ->where('es_description', $es_description)
            ->get();
        $this->assertCount(1, $cves);
        $cve = $cves->first();

        $response->assertRedirect(route('cve.index'));
        $response->assertSessionHas('cve.id', $cve->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $cve = Cve::factory()->create();

        $response = $this->get(route('cve.show', $cve));

        $response->assertOk();
        $response->assertViewIs('cve.show');
        $response->assertViewHas('cve');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $cve = Cve::factory()->create();

        $response = $this->get(route('cve.edit', $cve));

        $response->assertOk();
        $response->assertViewIs('cve.edit');
        $response->assertViewHas('cve');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CveController::class,
            'update',
            \App\Http\Requests\CveUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $cve = Cve::factory()->create();
        $cve_code = $this->faker->word;
        $cvss = $this->faker->numberBetween(-10000, 10000);
        $nessus_cod = $this->faker->word;
        $nmap_cod = $this->faker->word;
        $en_description = $this->faker->text;
        $es_description = $this->faker->text;

        $response = $this->put(route('cve.update', $cve), [
            'cve_code' => $cve_code,
            'cvss' => $cvss,
            'nessus_cod' => $nessus_cod,
            'nmap_cod' => $nmap_cod,
            'en_description' => $en_description,
            'es_description' => $es_description,
        ]);

        $cve->refresh();

        $response->assertRedirect(route('cve.index'));
        $response->assertSessionHas('cve.id', $cve->id);

        $this->assertEquals($cve_code, $cve->cve_code);
        $this->assertEquals($cvss, $cve->cvss);
        $this->assertEquals($nessus_cod, $cve->nessus_cod);
        $this->assertEquals($nmap_cod, $cve->nmap_cod);
        $this->assertEquals($en_description, $cve->en_description);
        $this->assertEquals($es_description, $cve->es_description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $cve = Cve::factory()->create();

        $response = $this->delete(route('cve.destroy', $cve));

        $response->assertRedirect(route('cve.index'));

        $this->assertDeleted($cve);
    }
}
