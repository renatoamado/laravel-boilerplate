<?php

namespace Tests\Feature\Requests\Example;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Example;
use Tests\TestCase;

class ExampleDeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        dd($this->generateRandomOccurence());
        $response = $this->delete('api/example_route/' . $this->generateRandomOccurence());
        $response->assertStatus(200);
    }
}
