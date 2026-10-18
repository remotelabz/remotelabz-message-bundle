<?php

namespace Remotelabz\Message\Message;

/**
 * Réponse à une DeviceInfoRequestMessage : informations collectées par le
 * worker sur une DeviceInstance.
 *
 * $info = [
 *     "ips" => [
 *         ["name" => "eth0", "mac" => "52:54:00:aa:bb:01", "ipv4" => ["10.11.0.5"], "ipv6" => []],
 *         ...
 *     ],
 *     "collectedAt" => 1760000000
 * ]
 *
 * Le tableau $info est volontairement libre et extensible : la même mécanique
 * permettra de collecter d'autres informations (uptime, nombre de NIC, état
 * QEMU/LXC...) sans créer de nouveau message.
 *
 * $error = null en succès, message d'erreur sinon (device inconnu, worker en
 *          échec...). Le worker répond toujours, y compris en erreur.
 */
class DeviceInfoMessage
{
    private string $uuid;
    private string $requestId;
    private array $info;
    private ?string $error;

    public function __construct(string $uuid, string $requestId, array $info = [], ?string $error = null)
    {
        $this->uuid = $uuid;
        $this->requestId = $requestId;
        $this->info = $info;
        $this->error = $error;
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

    public function getInfo(): array
    {
        return $this->info;
    }

    public function setInfo(array $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(?string $error): self
    {
        $this->error = $error;

        return $this;
    }
}
