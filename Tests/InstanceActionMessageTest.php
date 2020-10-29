<?php

namespace Remotelabz\Message\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Remotelabz\Message\Message\InstanceActionMessage;

class InstanceActionMessageTest extends TestCase
{
    public function testConstruct()
    {
        $message = new InstanceActionMessage('content', 'uuid', InstanceActionMessage::ACTION_START);

        $this->assertInstanceOf(InstanceActionMessage::class, $message);

        $this->expectException(InvalidArgumentException::class);

        $message = new InstanceActionMessage('content', 'uuid', 'another action value');
    }

    public function testGettersAndSetters()
    {
        $message = new InstanceActionMessage('', '', InstanceActionMessage::ACTION_START);

        $message->setContent('content');
        $message->setUuid('uuid');
        $message->setAction(InstanceActionMessage::ACTION_STOP);

        $this->assertEquals('content', $message->getContent());
        $this->assertEquals('uuid', $message->getUuid());
        $this->assertEquals(InstanceActionMessage::ACTION_STOP, $message->getAction());

        $this->expectException(InvalidArgumentException::class);
        $message->setAction('another action value');
    }
}
