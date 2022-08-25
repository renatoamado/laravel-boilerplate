<?php

namespace Tests\Feature\Requests\Example;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleUpdateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->put('api/example_route/' . $this->generateRandomOccurence(), $this->generateData());

        $response->assertStatus(200);
    }
}
