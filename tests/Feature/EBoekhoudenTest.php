<?php

namespace Mantix\EBoekhoudenRestLaravel\Tests\Feature;

use Mantix\EBoekhoudenRestApi\Client;
use Mantix\EBoekhoudenRestLaravel\Facades\EBoekhouden;
use Mantix\EBoekhoudenRestLaravel\Tests\TestCase;
use Mockery;

class EBoekhoudenTest extends TestCase {
    /** @test */
    public function it_resolves_the_client_from_the_container() {
        $this->assertInstanceOf(Client::class, $this->app->make('eboekhouden'));
        $this->assertInstanceOf(Client::class, $this->app->make(Client::class));
    }

    /** @test */
    public function it_can_use_the_facade() {
        // Mock the client
        $mock = Mockery::mock(Client::class);
        $mock->shouldReceive('getRelations')
            ->once()
            ->andReturn(['items' => [], 'count' => 0]);

        // Bind the mock to the container
        $this->app->instance('eboekhouden', $mock);

        // Use the facade
        $result = EBoekhouden::getRelations();

        // Assert the result
        $this->assertEquals(['items' => [], 'count' => 0], $result);
    }

    /** @test */
    public function it_loads_config_values() {
        $config = $this->app['config']['eboekhouden'];

        $this->assertEquals('test_token', $config['api_token']);
        $this->assertEquals('TestApp', $config['source']);
    }
}
