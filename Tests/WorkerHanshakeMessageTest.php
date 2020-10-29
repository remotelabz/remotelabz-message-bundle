<?php

namespace Remotelabz\Message\Tests;

use PHPUnit\Framework\TestCase;
use Remotelabz\Message\Message\WorkerHandshakeMessage;

class WorkerHandshakeMessageTest extends TestCase
{
    public function testConstruct()
    {
        $message = new WorkerHandshakeMessage('id');

        $this->assertInstanceOf(WorkerHandshakeMessage::class, $message);
    }

    public function testGettersAndSetters()
    {
        $message = new WorkerHandshakeMessage('id');

        $message->setId('id2');

        $this->assertEquals('id2', $message->getId());
    }
}
