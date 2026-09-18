<?php
 
namespace Remotelabz\Message\Message;
 
class LabLaunchRequestMessage
{
    private string $labUuid;
    private string $instancierUuid;
    private string $instancierType; // 'user' ou 'group'
    private int $fromExport;
 
    public function __construct(string $labUuid, string $instancierUuid, string $instancierType, int $fromExport = 0)
    {
        $this->labUuid = $labUuid;
        $this->instancierUuid = $instancierUuid;
        $this->instancierType = $instancierType;
        $this->fromExport = $fromExport;
    }
 
    public function getLabUuid(): string
    {
        return $this->labUuid;
    }
 
    public function getInstancierUuid(): string
    {
        return $this->instancierUuid;
    }
 
    public function getInstancierType(): string
    {
        return $this->instancierType;
    }
 
    public function getFromExport(): int
    {
        return $this->fromExport;
    }
}