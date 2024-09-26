<?php

namespace Remotelabz\Message\Message;

use InvalidArgumentException;
use ReflectionClass;

class InstanceActionMessage
{
    private $content;
    private $uuid;
    private $action;

    const ACTION_CREATE = "create";
    const ACTION_DELETE = "delete";
    const ACTION_START = "start";
    const ACTION_STOP  = "stop";
    const ACTION_RESET  = "reset";
    const ACTION_CONNECT  = "connect";
    const ACTION_DISCONNECT  = "disconnect";
    const ACTION_EXPORT_LAB = "export_lab";
    const ACTION_EXPORT_DEV = "export_device";
    const ACTION_DELETEDEV = "delete_device";
    const ACTION_DELETEOS = "delete_os";
    const ACTION_RENAMEOS = "rename_os";
    const ACTION_COPY2WORKER_DEV ="copy_os";

    /**
     * @param string $content Descriptor of the instance (JSON-formatted).
     * @param string $uuid Uuid of the device to start.
     * @param string $action Action to perform. Must be a const member of this class (e.g. `InstanceActionMessage::ACTION_CREATE`).
     */
    public function __construct(string $content, string $uuid, string $action)
    {
        $reflection = new ReflectionClass(__CLASS__);
        if (!in_array($action, $reflection->getConstants())) {
            throw new InvalidArgumentException('Wrong action provided');
        }

        $this->content = $content;
        $this->uuid = $uuid;
        $this->action = $action;
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

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $reflection = new ReflectionClass(__CLASS__);
        if (!in_array($action, $reflection->getConstants())) {
            throw new InvalidArgumentException('Wrong action string provided');
        }

        $this->action = $action;

        return $this;
    }
}
