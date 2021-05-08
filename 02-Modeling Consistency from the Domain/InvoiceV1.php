<?php

class InvoiceV1 {
    /** @var string */
    private $company;
    /** @var string */
    private $taxId;

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setTaxId($taxId) {
        $this->taxId = $taxId;
    }

    public function company() {
        return $this->company;
    }

    public function taxId() {
        return $this->taxId;
    }
}