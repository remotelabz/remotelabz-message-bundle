<?php

namespace Remotelabz\Message\Message;

/**
 * Topology of the shared labs of one group.
 *
 * The content is the JSON of the whole topology of a single group:
 * {"group":"<group uuid>","links":[{"a":{...},"b":{...}}, ...]}.
 *
 * The group uuid is the state key on the worker side: a message replaces the
 * entry of that group and the worker rebuilds its rules from the union of every
 * group, so the messages of the other groups are never overwritten. A message
 * with an empty link list means "no shared lab in this group" and makes the
 * worker purge its rules and routes for that group.
 */
class SecurityMessage
{
    private string $content;

    private string $group;

    public function __construct(string $content, string $group = '')
    {
        $this->content = $content;
        $this->group = $group;
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

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): self
    {
        $this->group = $group;

        return $this;
    }
}
