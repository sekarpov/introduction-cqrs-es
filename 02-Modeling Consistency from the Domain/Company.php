<?php

class Company {
    /** @var CompanyName */
    private $name;
    /** @var TaxId */
    private $taxId;

    public function __construct(CompanyName $name, TaxId $taxId) {
        $this->name = $name;
        $this->taxId = $taxId;
    }

    public function name() {
        return $this->name;
    }

    public function taxId() {
        return $this->taxId;
    }
}