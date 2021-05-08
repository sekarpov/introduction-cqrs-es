<?php

class TaxId {
    private $taxId;

    public function __construct($taxId) {
        if ( ! preg_match('/^[A-Z]{2,3}[A-Z0-9]{2,12}/i', $taxId)) {
            throw new TaxIdIsInvalid($taxId);
        }
        $this->taxId = $taxId;
    }

    public function toString() {
        return $this->taxId;
    }

    public function __toString() {
        return $this->toString();
    }
}