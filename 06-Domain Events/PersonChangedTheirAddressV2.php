<?php

class PersonChangedTheirAddressV2 {
    /** @var PersonId */
    private $personId;
    /** @var Address */
    private $address;

    public function __construct(PersonId $personId, Address $address) {
        $this->personId = $personId;
        $this->address = $address;
    }

    public function personId() {
        return $this->personId;
    }

    public function address() {
        return $this->address;
    }
}