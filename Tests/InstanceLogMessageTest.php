<?php

namespace Remotelabz\Message\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Remotelabz\Message\Message\InstanceLogMessage;

class InstanceLogMessageTest extends TestCase
{
    public function testConstruct()
    {
        $message = new InstanceLogMessage('content', InstanceLogMessage::TYPE_ERROR);

        $this->assertInstanceOf(InstanceLogMessage::class, $message);

        $this->expectException(InvalidArgumentException::class);

        $message = new InstanceLogMessage('content', 'another type value');
    }

    public function testGettersAndSetters()
    {
        $message = new InstanceLogMessage('', InstanceLogMessage::TYPE_ERROR);

        $message->setContent('content');
        
        $message->setType(InstanceLogMessage::TYPE_INFO);

        $this->assertEquals('content', $message->getContent());
        //$this->assertEquals('uuid', $message->getUuid());
        $this->assertEquals(InstanceLogMessage::TYPE_INFO, $message->getType());

        $this->expectException(InvalidArgumentException::class);
        $message->setType('another action value');
    }
}
