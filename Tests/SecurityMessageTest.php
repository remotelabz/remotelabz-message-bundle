<?php

namespace Remotelabz\Message\Tests;

use PHPUnit\Framework\TestCase;
use Remotelabz\Message\Message\SecurityMessage;

class SecurityMessageTest extends TestCase
{
    public function testConstruct()
    {
        $message = new SecurityMessage('{"group":"3f2b9c1e","links":[]}');

        $this->assertInstanceOf(SecurityMessage::class, $message);
        $this->assertEquals('{"group":"3f2b9c1e","links":[]}', $message->getContent());
        $this->assertEquals('', $message->getGroup());
    }

    public function testConstructWithGroup()
    {
        $message = new SecurityMessage('{"group":"3f2b9c1e","links":[]}', '3f2b9c1e');

        $this->assertEquals('3f2b9c1e', $message->getGroup());
    }

    public function testGettersAndSetters()
    {
        $message = new SecurityMessage('{"group":"3f2b9c1e","links":[]}', '3f2b9c1e');

        $message->setContent('{"group":"aa","links":[]}');
        $message->setGroup('aa');

        $this->assertEquals('{"group":"aa","links":[]}', $message->getContent());
        $this->assertEquals('aa', $message->getGroup());
    }

    public function testEmptyTopology()
    {
        $message = new SecurityMessage('{"group":"3f2b9c1e","links":[]}', '3f2b9c1e');

        $topology = json_decode($message->getContent(), true);

        $this->assertIsArray($topology);
        $this->assertEquals([], $topology['links']);
    }
}
