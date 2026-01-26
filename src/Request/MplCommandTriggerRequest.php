<?php

namespace Nrgone\EsbClient\Request;

final class MplCommandTriggerRequest
{
    /**
     * @var string
     */
    private $trigger;

    /**
     * @var array
     */
    private $data;

    public function __construct(string $trigger, array $data = [])
    {
        $this->trigger = $trigger;
        $this->data = $data;
    }

    public function getTrigger(): string
    {
        return $this->trigger;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
