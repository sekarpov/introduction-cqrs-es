<?php

class MoneyV2 {
    /** @var int */
    private $cents = 0;
    /** @var Currency */
    private $currency;

    public function __construct($amount, Currency $currency) {
        $this->cents = $amount * 100;
        $this->currency = $currency;
    }

    public function add(MoneyV2 $that) {
        return new MoneyV2($this->cents + $that->cents, $this->currency);
    }
}