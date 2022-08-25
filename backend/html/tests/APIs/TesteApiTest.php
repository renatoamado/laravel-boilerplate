<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Teste;

class TesteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_teste()
    {
        $teste = Teste::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/testes', $teste
        );

        $this->assertApiResponse($teste);
    }

    /**
     * @test
     */
    public function test_read_teste()
    {
        $teste = Teste::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/testes/'.$teste->id
        );

        $this->assertApiResponse($teste->toArray());
    }

    /**
     * @test
     */
    public function test_update_teste()
    {
        $teste = Teste::factory()->create();
        $editedTeste = Teste::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/testes/'.$teste->id,
            $editedTeste
        );

        $this->assertApiResponse($editedTeste);
    }

    /**
     * @test
     */
    public function test_delete_teste()
    {
        $teste = Teste::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/testes/'.$teste->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/testes/'.$teste->id
        );

        $this->response->assertStatus(404);
    }
}
