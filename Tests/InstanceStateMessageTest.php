<?php

namespace Remotelabz\Message\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Remotelabz\Message\Message\InstanceStateMessage;

class InstanceStateMessageTest extends TestCase
{
    public function testConstruct()
    {
        $message = new InstanceStateMessage(InstanceStateMessage::TYPE_DEVICE, 'uuid', InstanceStateMessage::STATE_CREATED);

        $this->assertInstanceOf(InstanceStateMessage::class, $message);

        $this->expectException(InvalidArgumentException::class);

        $message = new InstanceStateMessage(InstanceStateMessage::TYPE_DEVICE, 'uuid', 'another state value');

        $this->expectException(InvalidArgumentException::class);

        $message = new InstanceStateMessage('another type value', 'uuid', InstanceStateMessage::STATE_CREATED);
    }

    public function testGettersAndSetters()
    {
        $message = new InstanceStateMessage(InstanceStateMessage::TYPE_DEVICE, '', InstanceStateMessage::STATE_CREATED);

        $message->setType(InstanceStateMessage::TYPE_LAB);
        $message->setUuid('uuid');
        $message->setState(InstanceStateMessage::STATE_CREATING);

        $this->assertEquals(InstanceStateMessage::TYPE_LAB, $message->getType());
        $this->assertEquals('uuid', $message->getUuid());
        $this->assertEquals(InstanceStateMessage::STATE_CREATING, $message->getState());

        $this->expectException(InvalidArgumentException::class);
        $message->setType('another type value');
        $this->expectException(InvalidArgumentException::class);
        $message->setState('another state value');
    }
}
