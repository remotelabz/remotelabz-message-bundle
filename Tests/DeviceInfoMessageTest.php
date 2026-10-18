<?php

namespace Remotelabz\Message\Tests;

use PHPUnit\Framework\TestCase;
use Remotelabz\Message\Message\DeviceInfoMessage;

class DeviceInfoMessageTest extends TestCase
{
    public function testConstructWithInfo()
    {
        $info = ['ips' => [['name' => 'eth0', 'mac' => '52:54:00:aa:bb:01', 'ipv4' => ['10.11.0.5'], 'ipv6' => []]]];
        $message = new DeviceInfoMessage('6f3a-uuid', 'req-1', $info);

        $this->assertInstanceOf(DeviceInfoMessage::class, $message);
        $this->assertEquals('6f3a-uuid', $message->getUuid());
        $this->assertEquals('req-1', $message->getRequestId());
        $this->assertEquals($info, $message->getInfo());
        $this->assertNull($message->getError());
    }

    public function testConstructWithError()
    {
        $message = new DeviceInfoMessage('6f3a-uuid', 'req-1', [], 'device not found');

        $this->assertSame([], $message->getInfo());
        $this->assertEquals('device not found', $message->getError());
    }

    public function testDefaults()
    {
        $message = new DeviceInfoMessage('6f3a-uuid', 'req-1');

        $this->assertSame([], $message->getInfo());
        $this->assertNull($message->getError());
    }

    public function testGettersAndSetters()
    {
        $message = new DeviceInfoMessage('6f3a-uuid', 'req-1');
        $message->setUuid('other');
        $message->setRequestId('req-2');
        $message->setInfo(['uptime' => 42]);
        $message->setError('boom');

        $this->assertEquals('other', $message->getUuid());
        $this->assertEquals('req-2', $message->getRequestId());
        $this->assertEquals(['uptime' => 42], $message->getInfo());
        $this->assertEquals('boom', $message->getError());
    }
}
