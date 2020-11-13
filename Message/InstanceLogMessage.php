<?php

namespace Remotelabz\Message\Message;

use InvalidArgumentException;
use ReflectionClass;

class InstanceLogMessage
{
    private $content;
    private $uuid;
    private $type;

    const TYPE_INFO = "info";
    const TYPE_DEBUG = "debug";
    const TYPE_ERROR = "error";
    const TYPE_WARNING = "warning";

    public function __construct(string $uuid, string $content, string $type)
    {
        $reflection = new ReflectionClass(__CLASS__);
        if (!in_array($type, $reflection->getConstants())) {
            throw new InvalidArgumentException('Wrong type provided');
        }

        $this->content = $content;
        $this->uuid = $uuid;
        $this->type = $type;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $reflection = new ReflectionClass(__CLASS__);
        if (!in_array($type, $reflection->getConstants())) {
            throw new InvalidArgumentException('Wrong type provided');
        }

        $this->type = $type;

        return $this;
    }
}
