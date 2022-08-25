<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParametrizacaoApi;

class ParametrizacaoApiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ParametrizacaoApi()
    {
        $parametrizacaoApi = ParametrizacaoApi::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ParametrizacaoApis', $parametrizacaoApi
        );

        $this->assertApiResponse($parametrizacaoApi);
    }

    /**
     * @test
     */
    public function test_read_ParametrizacaoApi()
    {
        $parametrizacaoApi = ParametrizacaoApi::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ParametrizacaoApis/'.$parametrizacaoApi->id
        );

        $this->assertApiResponse($parametrizacaoApi->toArray());
    }

    /**
     * @test
     */
    public function test_update_ParametrizacaoApi()
    {
        $parametrizacaoApi = ParametrizacaoApi::factory()->create();
        $editedParametrizacaoApi = ParametrizacaoApi::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ParametrizacaoApis/'.$parametrizacaoApi->id,
            $editedParametrizacaoApi
        );

        $this->assertApiResponse($editedParametrizacaoApi);
    }

    /**
     * @test
     */
    public function test_delete_ParametrizacaoApi()
    {
        $parametrizacaoApi = ParametrizacaoApi::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ParametrizacaoApis/'.$parametrizacaoApi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ParametrizacaoApis/'.$parametrizacaoApi->id
        );

        $this->response->assertStatus(404);
    }
}
