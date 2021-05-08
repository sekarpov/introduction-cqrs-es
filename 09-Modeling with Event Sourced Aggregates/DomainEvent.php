<?php

interface DomainEvent {
    public function payload();
    public static function fromArray(array $payload);
}