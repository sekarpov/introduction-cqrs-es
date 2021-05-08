<?php

abstract class Projector implements Listener {
    protected $aggregates;

    abstract public function name();
    abstract public function reset();

    public function __construct(AggregateRepository $aggregates) {
        $this->aggregates = $aggregates;
    }

    private function getShortName($class) {
        $className = explode('\\', get_class($class));
        return $className[count($className) - 1];
    }

    public function handle($event) {
        // MAGIC!@#!@#
        $method = lcfirst($this->getShortName($event));
        if (method_exists($this, $method)) {
            $this->$method($event);
        }
    }
}
