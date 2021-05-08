<?php

class EventDispatcher {

    private $listeners = [];

    public function addListener($listener) {
        $this->listeners[] = $listener;
    }

    public function dispatch($event) {
        foreach ($this->listeners as $listener) {
            $listener->handle($event);
        }
    }
}
