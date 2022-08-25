<?php

namespace Tests\Feature\Login;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class OauthIntegrityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $password_granter = DB::connection('pgsql_secondary')->table('oauth_clients')->where('password_client', true)->first();
        return $this->assertTrue(!empty($password_granter));
    }
}
