<?php

class InvoiceId {
    /** @var Uuid */
    private $id;

    private function __construct(Uuid $id) {
        $this->id = $id;
    }

    public static function fromString($id) {
        return new InvoiceId(Uuid::fromString($id));
    }

    public static function generateNew() {
        return new InvoiceId(Uuid::uuid4());
    }

    public function equals(InvoiceId $that) {
        return $this->id == $that->id;
    }

    public function toString() {
        return $this->id->toString();
    }

    public function __toString() {
        return $this->toString();
    }
}