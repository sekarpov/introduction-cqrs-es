<?php

class InvoiceV2 {
    /** @var string */
    private $recipient;
    /** @var string */
    private $recipientTaxId;

    public function __construct($recipient, $recipientTaxId) {
        $this->recipient = $recipient;
        $this->recipientTaxId = $recipientTaxId;
    }

    public function isValid() {
        return preg_match('/^[A-Z]{2,3}[A-Z0-9]{2,12}/i', $this->recipientTaxId);
    }

    public function recipient() {
        return $this->recipient;
    }

    public function recipientTaxId() {
        return $this->recipientTaxId;
    }
}