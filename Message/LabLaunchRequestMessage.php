<?php

namespace Remotelabz\Message\Message;

class LabLaunchRequestMessage
{
    private string $labInstanceUuid;

    private bool $autoStartDevices;

    public function __construct(string $labInstanceUuid, bool $autoStartDevices = false)
    {
        $this->labInstanceUuid = $labInstanceUuid;
        $this->autoStartDevices = $autoStartDevices;
    }

    public function getLabInstanceUuid(): string
    {
        return $this->labInstanceUuid;
    }

    public function setLabInstanceUuid(string $labInstanceUuid): self
    {
        $this->labInstanceUuid = $labInstanceUuid;

        return $this;
    }

    public function isAutoStartDevices(): bool
    {
        return $this->autoStartDevices;
    }

    public function setAutoStartDevices(bool $autoStartDevices): self
    {
        $this->autoStartDevices = $autoStartDevices;

        return $this;
    }
}
