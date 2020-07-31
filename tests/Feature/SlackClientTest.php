<?php

namespace Tests\Feature;

use App\Slack\SlackClient;
use Tests\TestCase;

class SlackClientTest extends TestCase
{
    /** @test */
    function it_calls_api_methods_successfully()
    {
        $client = app(SlackClient::class);

        $response = $client->apiTest(null, 'some return value');

        $this->assertIsArray($response);
        $this->assertEquals(true, $response['ok']);
        $this->assertEquals('some return value', $response['args']['foo']);
    }

    /** @test */
    function it_throws_errors_when_slack_returns_not_ok()
    {
        $client = app(SlackClient::class);

        $response = $client->apiTest('not', 'bleh');

        $this->assertIsArray($response);
    }
}
