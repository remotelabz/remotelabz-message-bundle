<?php

namespace Remotelabz\Message\Tests;

use PHPUnit\Framework\TestCase;
use Remotelabz\Message\Message\LabLaunchRequestMessage;

class LabLaunchRequestMessageTest extends TestCase
{
    public function testConstruct()
    {
        $message = new LabLaunchRequestMessage('uuid');

        $this->assertInstanceOf(LabLaunchRequestMessage::class, $message);
        $this->assertEquals('uuid', $message->getLabInstanceUuid());
        $this->assertFalse($message->isAutoStartDevices());
    }

    public function testConstructWithAutoStartDevices()
    {
        $message = new LabLaunchRequestMessage('uuid', true);

        $this->assertTrue($message->isAutoStartDevices());
    }

    public function testGettersAndSetters()
    {
        $message = new LabLaunchRequestMessage('uuid', true);

        $message->setLabInstanceUuid('uuid2');
        $message->setAutoStartDevices(false);

        $this->assertEquals('uuid2', $message->getLabInstanceUuid());
        $this->assertFalse($message->isAutoStartDevices());
    }
}
