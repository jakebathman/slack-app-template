<?php

use Illuminate\Support\Facades\Route;

Route::name('slack.')->prefix('slack')
    ->middleware(['slack.verify'])
    ->group(function () {
        Route::any('test', function () {
            return response()->json(['ok' => true]);
        })->name('test');

        Route::any('slash/foo', 'Slack\SlashCommandController@foo')->name('slash.foo');

        Route::post('interaction', 'Slack\InteractionController')->name('interaction');

        Route::post('event', 'Slack\EventController')->name('event');
    });
