<?php

namespace Remotelabz\Message\Message;

class WorkerHandshakeMessage
{
    /** @var string */
    protected $id;

    public function __construct(string $id)
    {
        $this->$id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }
}