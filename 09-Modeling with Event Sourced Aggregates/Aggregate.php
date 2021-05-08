<?php

abstract class Aggregate {
    /** @var array */
    private $pendingEvents = [];

    abstract protected function apply($event);

    protected function __construct() {}

    public static function rebuildFrom($events) {
        $aggregate = new static;
        foreach($events as $event) {
            $aggregate->apply($event);
        }
        return $aggregate;
    }

    public function raise($event) {
        $this->pendingEvents[] = $event;
        $this->apply($event);
    }

    public function pendingEvents() {
        $events = $this->pendingEvents;
        $this->pendingEvents = [];
        return $events;
    }
}
