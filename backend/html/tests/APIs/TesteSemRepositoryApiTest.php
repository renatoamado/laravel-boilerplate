<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TesteSemRepository;

class TesteSemRepositoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_teste_sem_repository()
    {
        $testeSemRepository = TesteSemRepository::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/teste_sem_repositories', $testeSemRepository
        );

        $this->assertApiResponse($testeSemRepository);
    }

    /**
     * @test
     */
    public function test_read_teste_sem_repository()
    {
        $testeSemRepository = TesteSemRepository::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/teste_sem_repositories/'.$testeSemRepository->id
        );

        $this->assertApiResponse($testeSemRepository->toArray());
    }

    /**
     * @test
     */
    public function test_update_teste_sem_repository()
    {
        $testeSemRepository = TesteSemRepository::factory()->create();
        $editedTesteSemRepository = TesteSemRepository::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/teste_sem_repositories/'.$testeSemRepository->id,
            $editedTesteSemRepository
        );

        $this->assertApiResponse($editedTesteSemRepository);
    }

    /**
     * @test
     */
    public function test_delete_teste_sem_repository()
    {
        $testeSemRepository = TesteSemRepository::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/teste_sem_repositories/'.$testeSemRepository->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/teste_sem_repositories/'.$testeSemRepository->id
        );

        $this->response->assertStatus(404);
    }
}
