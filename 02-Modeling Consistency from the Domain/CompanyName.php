<?php

class CompanyName {
    private $companyName;

    public function __construct($companyName) {
        if (is_string($companyName) && strlen($companyName) > 0) {
            throw new CompanyNameIsInvalid($companyName);
        }
        $this->companyName = $companyName;
    }

    public function toString() {
        return $this->companyName;
    }

    public function __toString() {
        return $this->toString();
    }
}