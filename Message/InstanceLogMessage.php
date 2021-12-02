<?php

namespace Remotelabz\Message\Message;

use InvalidArgumentException;

class InstanceLogMessage
{
    private $content;
    private $scope;
    private $uuid;
    private $type;

    const TYPE_INFO = "info";
    const TYPE_DEBUG = "debug";
    const TYPE_ERROR = "error";
    const TYPE_WARNING = "warning";

    const SCOPE_PUBLIC = "public";
    const SCOPE_PRIVATE = "private";

    public function __construct(string $content, string $type, string $scope = self::SCOPE_PRIVATE)
    {
        if (!in_array($type, [self::TYPE_DEBUG, self::TYPE_INFO, self::TYPE_WARNING, self::TYPE_ERROR])) {
            throw new InvalidArgumentException('Wrong type provided');
        }

        $this->content = $content;
        $this->scope = $scope;
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

    /*public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }
*/
    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        if (!in_array($type, [self::TYPE_DEBUG, self::TYPE_INFO, self::TYPE_WARNING, self::TYPE_ERROR])) {
            throw new InvalidArgumentException('Wrong type provided');
        }

        $this->type = $type;

        return $this;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setScope(string $scope): self
    {
        $this->scope = $scope;

        return $this;
    }
}
