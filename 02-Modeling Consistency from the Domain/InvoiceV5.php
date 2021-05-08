<?php

class InvoiceV5 {
    /** @var Company */
    private $sender;
    /** @var Company */
    private $recipient;
    /** @var LineItems */
    private $lineItems;

    public function __construct(Company $sender, Company $recipient, LineItems $lineItems) {
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->lineItems = $lineItems;
    }

    public function sender() {
        return $this->sender;
    }

    public function recipient() {
        return $this->recipient;
    }

    public function lineItems() {
        return $this->lineItems;
    }
}