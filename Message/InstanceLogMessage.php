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

    public function __construct(string $uuid, string $content, string $type, string $scope = self::SCOPE_PRIVATE)
    {
        if (!in_array($type, [self::TYPE_DEBUG, self::TYPE_INFO, self::TYPE_WARNING, self::TYPE_ERROR])) {
            throw new InvalidArgumentException('Wrong type provided');
        }

        $this->content = $content;
        $this->scope = $scope;
        //$this->uuid = $uuid;
        $this->uuid = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff)  | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
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
