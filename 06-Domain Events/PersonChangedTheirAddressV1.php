<?php

class PersonChangedTheirAddressV1 {
    /** @var PersonId */
    private $personId;

    public function __construct(PersonId $personId) {
        $this->personId = $personId;
    }

    public function personId() {
        return $this->personId;
    }
}