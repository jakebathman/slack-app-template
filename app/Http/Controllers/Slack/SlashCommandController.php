<?php

namespace App\Http\Controllers\Slack;

use App\Http\Controllers\Controller;
use App\Slack\BlockKitMessage;
use App\Slack\SlackClient;

class SlashCommandController extends Controller
{
    protected $client;

    public function __construct(SlackClient $client)
    {
        $this->client = $client;
    }

    public function foo()
    {
        $data = collect(request()->all());

        $message = new BlockKitMessage;

        $message->image();
    }
}
