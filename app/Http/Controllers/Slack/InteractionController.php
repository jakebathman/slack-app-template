<?php

namespace App\Http\Controllers\Slack;

use App\Events\Slack\CreateEntryInteraction;
use App\Http\Controllers\Controller;
use App\Slack\HandleInteraction;
use App\Slack\SlackClient;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class InteractionController extends Controller
{
    protected $client;

    public function __construct(SlackClient $client)
    {
        $this->client = $client;
    }

    /**
     * Interactions in the Slack API are fired any time a user interacts with
     * some bit of UI. These include built-in action buttons (such as message
     * or global actions) and ones that this application presents to the user
     * (such as a modal input with a submit button).
     *
     * All of these interaction payloads are structured similarly, and this
     * controller is then main ingress point for handling them.
     *
     * More info on interactivity: https://api.slack.com/messaging/interactivity
     */
    public function __invoke()
    {
        // Data is sent as JSON in the request's "payload" parameter
        $data = collect(json_decode(request('payload'), true));

        // Here, handle the interaction based on its type. There are four
        // types of payloads, but your app may only handle some (or none)
        // More info on these payloads: https://api.slack.com/reference/interaction-payloads
        switch (Arr::get($data, 'type')) {
            case 'message_action':
                // The same interaction type might have multiple
                // callback IDs, which the application may handle differently
                // More info: https://api.slack.com/reference/interaction-payloads/shortcuts
                $callbackId = Arr::get($data, 'callback_id');

                switch ($callbackId) {
                    case 'shortcut_foo':
                        $this->handleFoo($data);
                        break;


                    default:
                        //
                        break;
                }
                break;

            case 'block_actions':
                // The user clicked an action button, such as "Close Results"
                $this->handleBlockAction($data);
                break;

            case 'view_submission':
                // The user submitted a modal with some data
                $this->handleViewSubmission($data);
                break;

            case 'view_closed':
                // The user closed a modal
                $this->handleViewClosed($data);
                break;

            default:
                //
                break;
        }
    }

    public function handleBlockAction($data)
    {
        //
    }

    public function handleViewSubmission($data)
    {
        //
    }

    public function handleViewClosed($data)
    {
        //
    }
}
