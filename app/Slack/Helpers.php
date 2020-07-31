<?php

namespace App\Slack;

class Helpers
{
    /**
     * Format a link to Slack's markdown format
     */
    public static function link($url, $text = null, $bold = false)
    {
        if ($text) {
            $link = "<{$url}|" . $text . '>';
        } else {
            $link = "<{$url}>";
        }

        return $bold ? "*{$link}*" : $link;
    }
}
