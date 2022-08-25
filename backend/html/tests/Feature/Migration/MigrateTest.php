<?php

namespace Tests\Feature\Migration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MigrateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        try {
            Artisan::call('migrate:fresh');
            $this->assertTrue(true);
        } catch (\Exception $e) {
            $this->assertNotFalse(False, $e->getMessage());
        }
    }
}
