<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ParametrizacaoApi_campos;

class ParametrizacaoApiCamposApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ParametrizacaoApi_campos()
    {
        $parametrizacaoApiCampos = ParametrizacaoApi_campos::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ParametrizacaoApi_campos', $parametrizacaoApiCampos
        );

        $this->assertApiResponse($parametrizacaoApiCampos);
    }

    /**
     * @test
     */
    public function test_read_ParametrizacaoApi_campos()
    {
        $parametrizacaoApiCampos = ParametrizacaoApi_campos::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ParametrizacaoApi_campos/'.$parametrizacaoApiCampos->id
        );

        $this->assertApiResponse($parametrizacaoApiCampos->toArray());
    }

    /**
     * @test
     */
    public function test_update_ParametrizacaoApi_campos()
    {
        $parametrizacaoApiCampos = ParametrizacaoApi_campos::factory()->create();
        $editedParametrizacaoApi_campos = ParametrizacaoApi_campos::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ParametrizacaoApi_campos/'.$parametrizacaoApiCampos->id,
            $editedParametrizacaoApi_campos
        );

        $this->assertApiResponse($editedParametrizacaoApi_campos);
    }

    /**
     * @test
     */
    public function test_delete_ParametrizacaoApi_campos()
    {
        $parametrizacaoApiCampos = ParametrizacaoApi_campos::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ParametrizacaoApi_campos/'.$parametrizacaoApiCampos->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ParametrizacaoApi_campos/'.$parametrizacaoApiCampos->id
        );

        $this->response->assertStatus(404);
    }
}
