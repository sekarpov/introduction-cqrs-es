<?php

class InvoiceV4 {
    /** @var CompanyName */
    private $recipient;
    /** @var TaxId */
    private $recipientTaxId;

    public function __construct(CompanyName $recipient, TaxId $recipientTaxId) {
        $this->recipient = $recipient;
        $this->recipientTaxId = $recipientTaxId;
    }

    public function recipient() {
        return $this->recipient;
    }

    public function recipientTaxId() {
        return $this->recipientTaxId;
    }
}