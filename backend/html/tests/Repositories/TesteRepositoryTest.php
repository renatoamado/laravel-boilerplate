<?php namespace Tests\Repositories;

use App\Models\Teste;
use App\Repositories\TesteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TesteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TesteRepository
     */
    protected $testeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->testeRepo = \App::make(TesteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_teste()
    {
        $teste = Teste::factory()->make()->toArray();

        $createdTeste = $this->testeRepo->create($teste);

        $createdTeste = $createdTeste->toArray();
        $this->assertArrayHasKey('id', $createdTeste);
        $this->assertNotNull($createdTeste['id'], 'Created Teste must have id specified');
        $this->assertNotNull(Teste::find($createdTeste['id']), 'Teste with given id must be in DB');
        $this->assertModelData($teste, $createdTeste);
    }

    /**
     * @test read
     */
    public function test_read_teste()
    {
        $teste = Teste::factory()->create();

        $dbTeste = $this->testeRepo->find($teste->id);

        $dbTeste = $dbTeste->toArray();
        $this->assertModelData($teste->toArray(), $dbTeste);
    }

    /**
     * @test update
     */
    public function test_update_teste()
    {
        $teste = Teste::factory()->create();
        $fakeTeste = Teste::factory()->make()->toArray();

        $updatedTeste = $this->testeRepo->update($fakeTeste, $teste->id);

        $this->assertModelData($fakeTeste, $updatedTeste->toArray());
        $dbTeste = $this->testeRepo->find($teste->id);
        $this->assertModelData($fakeTeste, $dbTeste->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_teste()
    {
        $teste = Teste::factory()->create();

        $resp = $this->testeRepo->delete($teste->id);

        $this->assertTrue($resp);
        $this->assertNull(Teste::find($teste->id), 'Teste should not exist in DB');
    }
}
