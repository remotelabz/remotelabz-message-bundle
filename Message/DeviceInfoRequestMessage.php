<?php

namespace Remotelabz\Message\Message;

/**
 * Demande de collecte d'informations sur une DeviceInstance.
 *
 * Le front ne connaît pas l'IP réelle d'une instance (VM QEMU ou conteneur LXC) :
 * seul le worker qui l'héberge la connaît. Cette demande lui est envoyée et le
 * worker répond avec un DeviceInfoMessage.
 *
 * $content   = descripteur JSON du LabInstance (sérialisation JMS, groupe
 *              "worker"), identique à celui de ACTION_START : la demande est
 *              auto-portante, le worker ne conserve aucun état.
 * $uuid      = UUID de la DeviceInstance concernée.
 * $requestId = identifiant de corrélation (UUID généré par le front), renvoyé
 *              tel quel par le worker pour libérer le verrou anti-spam côté front.
 */
class DeviceInfoRequestMessage
{
    private string $content;
    private string $uuid;
    private string $requestId;

    public function __construct(string $content, string $uuid, string $requestId)
    {
        $this->content = $content;
        $this->uuid = $uuid;
        $this->requestId = $requestId;
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

    public function getRequestId(): string
    {
        return $this->requestId;
    }

    public function setRequestId(string $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }
}
