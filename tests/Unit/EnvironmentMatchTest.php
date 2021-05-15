<?php


namespace Tests\Unit;


use Monolog\Test\TestCase;

class EnvironmentMatchTest extends TestCase
{
    public function test_testing_environment()
    {
        $this->assertSame(env('APP_ENV'), 'testing');
    }
}
