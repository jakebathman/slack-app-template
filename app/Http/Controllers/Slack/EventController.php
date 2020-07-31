<?php

namespace App\Http\Controllers\Slack;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Note: This controller is not (yet) used. Implement it when adding
     * link unfurling, emoji reaction listeners, or other Event functionality.
     *
     * Events in the Slack API are best handled asynchronously. This method
     * is the entry point for all events, and its purpose is to route the event
     * payload to different handlers as needed. Responses to events (e.g. a bot
     * posting a message in a channel) should be queued (but *can* happen here)
     *
     * More info on the Events API: https://api.slack.com/events-api
     *
     * A few things to keep in mind:
     *   - Slack needs an acknowledgement response from us *within three seconds*.
     *      If it doesn't get one, the user gets shown an error in Slack
     *   - If the event can be handled quickly, a text response can be returned
     *      to the user as an ephemeral (private) message in the channel
     *   - If not responding to the user directly, make sure to return an
     *      HTTP 200 success as quickly as possible, and queue longer operations
     */
    public function __invoke()
    {
        $data = request()->all();

        // Here, handle the event based on its type. The event payload data is
        // sent in the request's "event" parameter
        // More info on event types: https://api.slack.com/events-api#event_types
        if ($event = Arr::get($data, 'event')) {
            switch ($event['type']) {
                case 'reaction_added':
                    //
                    break;

                case 'link_shared':
                    //
                    break;

                default:
                    //
                    break;
            }
        }

        // If payload doesn't have an inner event, it might be a challenge
        // Learn more: https://api.slack.com/events/url_verification
        if (request('type') == 'url_verification') {
            return request('challenge');
        }

        // By default, return an empty 200 to acknowledge we've received the event
        return response(null, 200);
    }
}
