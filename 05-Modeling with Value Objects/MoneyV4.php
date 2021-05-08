<?php

class MoneyV4 {
    /** @var int */
    private $cents = 0;
    /** @var Currency */
    private $currency;

    private function __construct($cents, Currency $currency) {
        $this->cents = $cents;
        $this->currency = $currency;
    }

    public static function fromString($amount, Currency $currency) {
        return new MoneyV4($amount * 100, $currency);
    }

    public static function fromCents($cents, Currency $currency) {
        return new MoneyV4($cents, $currency);
    }

    public function add(MoneyV4 $that) {
        if ( ! $this->currency->equals($that->currency)) {
            throw new CurrenciesDontMatch($this->currency, $that->currency);
        }
        return new MoneyV4($this->cents + $that->cents, $this->currency);
    }
}