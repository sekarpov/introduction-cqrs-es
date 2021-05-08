<?php

class PersonId {
    /** @var Uuid */
    private $id;

    private function __construct(Uuid $id) {
        $this->id = $id;
    }

    public static function fromString($id) {
        return new PersonId(Uuid::fromString($id));
    }

    public static function generateNew() {
        return new PersonId(Uuid::uuid4());
    }

    public function equals(PersonId $that) {
        return $this->id == $that->id;
    }

    public function toString() {
        return $this->id->toString();
    }

    public function __toString() {
        return $this->toString();
    }
}