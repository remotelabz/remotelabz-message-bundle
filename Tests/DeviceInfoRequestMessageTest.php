<?php

namespace Remotelabz\Message\Tests;

use PHPUnit\Framework\TestCase;
use Remotelabz\Message\Message\DeviceInfoRequestMessage;

class DeviceInfoRequestMessageTest extends TestCase
{
    public function testConstruct()
    {
        $message = new DeviceInfoRequestMessage('{"uuid":"abc"}', '6f3a-uuid', 'req-1');

        $this->assertInstanceOf(DeviceInfoRequestMessage::class, $message);
        $this->assertEquals('{"uuid":"abc"}', $message->getContent());
        $this->assertEquals('6f3a-uuid', $message->getUuid());
        $this->assertEquals('req-1', $message->getRequestId());
    }

    public function testGettersAndSetters()
    {
        $message = new DeviceInfoRequestMessage('{"uuid":"abc"}', '6f3a-uuid', 'req-1');

        $message->setContent('{}');
        $message->setUuid('other-uuid');
        $message->setRequestId('req-2');

        $this->assertEquals('{}', $message->getContent());
        $this->assertEquals('other-uuid', $message->getUuid());
        $this->assertEquals('req-2', $message->getRequestId());
    }
}
