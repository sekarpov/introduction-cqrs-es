<?php

class TaxIdIsInvalid extends \Exception {
    public function __construct($taxId) {
        parent::__construct("Tax ID [{$taxId}] is invalid.");
    }
}