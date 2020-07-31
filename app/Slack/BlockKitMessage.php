<?php

namespace App\Slack;

class BlockKitMessage
{
    public $blocks;

    public function actions($elements)
    {
        $this->blocks[] = [
            'type' => 'actions',
            'elements' => $elements,
        ];

        return $this;
    }

    public function context($elements)
    {
        $this->blocks[] = [
            'type' => 'context',
            'elements' => $elements,
        ];

        return $this;
    }

    public function divider()
    {
        $this->blocks[] =   [
            'type' => 'divider',
        ];

        return $this;
    }

    public function file()
    {
        // $this->blocks[] = [

        // ];

        return $this;
    }

    public function image()
    {
        // $this->blocks[] = [

        // ];

        return $this;
    }

    public function section(
        $text,
        $textType = 'mrkdwn',
        $blockId = null,
        $fields = null,
        $accessory = null
    ) {
        $this->blocks[] = [
            'type' => 'section',
            'text' => [
                'type' => $textType,
                'text' => $text,
            ],
        ];

        return $this;
    }

    public function __toString()
    {
        return json_encode(['blocks'=>$this->blocks]);
    }
}
