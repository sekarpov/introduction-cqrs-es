<?php

interface EventStore {
    public function persist(AggregateIdentity $aggregateIdentity, Events $events);
    public function eventsFor(AggregateIdentity $aggregateIdentity);
}