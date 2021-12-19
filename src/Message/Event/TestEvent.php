<?php


namespace App\Message\Event;


class TestEvent
{
    private $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getFilename(): string
    {
        return $this->name;
    }

}