<?php

namespace Tests\Feature\Connection;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MockDatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        try {
            DB::connection(env('DB_CONNECTION'));
            $this->assertTrue(true);
        } catch (\Exception $e) {
            echo "Could not connect to the tests database.";
            $this->assertTrue(false);
        }
    }
}
