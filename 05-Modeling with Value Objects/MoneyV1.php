<?php

class MoneyV1 {
    /** @var int */
    private $cents = 0;
    /** @var Currency */
    private $currency;

    public function __construct($amount, Currency $currency) {
        $this->cents = $amount * 100;
        $this->currency = $currency;
    }
}