<?php

class MoneyV3 {
    /** @var int */
    private $cents = 0;
    /** @var Currency */
    private $currency;

    public function __construct($amount, Currency $currency) {
        $this->cents = $amount * 100;
        $this->currency = $currency;
    }

    public function add(MoneyV3 $that) {
        if ( ! $this->currency->equals($that->currency)) {
            throw new CurrenciesDontMatch($this->currency, $that->currency);
        }
        return new MoneyV3($this->cents + $that->cents, $this->currency);
    }
}