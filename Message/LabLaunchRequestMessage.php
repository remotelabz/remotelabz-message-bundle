<?php

namespace Remotelabz\Message\Message;

class LabLaunchRequestMessage
{
    private string $labUuid;
    private string $instancierType;
    private string $instancierUuid;

    public function __construct(string $labUuid, string $instancierType, string $instancierUuid)
    {
        $this->labUuid = $labUuid;
        $this->instancierType = $instancierType;
        $this->instancierUuid = $instancierUuid;
    }

    public function getLabUuid(): string
    {
        return $this->labUuid;
    }

    public function getInstancierType(): string
    {
        return $this->instancierType;
    }

    public function getInstancierUuid(): string
    {
        return $this->instancierUuid;
    }
}