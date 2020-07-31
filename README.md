![Slack App Template](banner.png)

This template repo is a base Laravel application with additional Slack app support added in.

Most existing features or tools will live separately from each other. If you're only going to add a slash command, there's no need to remove the other classes you aren't using.

## First-steps

Once you've made your own repo using this template, you must enter your app's secrets (see [api.slack.com/apps](https://api.slack.com/apps) for these).

1. Add your `SLACK_APP_SIGNING_SECRET` to `.env`
2. Add your `SLACK_BOT_USER_TOKEN` to `.env`

## General features

### API Verification middleware

`app/Http/Middleware/SlackApiVerification.php`

This middleware (registered as `slack.verify`) is already added to the `slack.` API route group. It facilitates [message signature verification](https://api.slack.com/authentication/verifying-requests-from-slack) if you'll be receiving requests _from_ Slack, such as event or interaction payloads.

### Block Kit builder

`app/Slack/BlockKitMessage.php`

This class is used to construct Block Kit messages and payloads for use elsewhere in the app.

### Slack API Client

`app/Slack/SlackClient.php`

A simple API calling client with some built-in methods and helpers. This client assumes you'll be using a [bot user token](https://api.slack.com/authentication/token-types#bot) for authentication.

With this client is a custom error class at `app/Exceptions/SlackApiError.php`. This can be used to catch errors in your API calls as separate from an error with the call itself.

### Helpers class

`app/Slack/Helpers.php`

A simple class with only one method to help format URLs in messages. However, this class is a good place to put future general Slack-related helper methods as you build your app.

## Slash commands

For command `/foo`:
- Route defined in `api.php` as `slack.slash.foo`
- Handler in `app/Http/Controllers/Slack/SlashCommandController.php@foo`

## Interactivity

- Route defined in `api.php` as `slack.interaction`
- Handler in `app/Http/Controllers/Slack/InteractionController.php`
  
## Events

- Route defined in `api.php` as `slack.event`
- Handler in `app/Http/Controllers/Slack/EventController.php`
