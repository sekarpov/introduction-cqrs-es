<?php

class Money {
    /** @var int */
    private $cents = 0;
    /** @var Currency */
    private $currency;

    private function __construct($cents, Currency $currency) {
        $this->cents = $cents;
        $this->currency = $currency;
    }

    public static function fromString($amount, Currency $currency) {
        return new Money($amount * 100, $currency);
    }

    public static function fromCents($cents, Currency $currency) {
        return new Money($cents, $currency);
    }

    public function add(Money $that) {
        if ( ! $this->currency->equals($that->currency)) {
            throw new CurrenciesDontMatch($this->currency, $that->currency);
        }
        return new Money($this->cents + $that->cents, $this->currency);
    }

    public function reducedByPercent($percent) {
        $reduction = $this->cents * ($percent / 100);
        $difference = $this->cents - $reduction;
        $rounded = round($difference, 0);
        return Money::fromCents($rounded, $this->currency);
    }

    public function currency() {
        return $this->currency;
    }

    public function equals(Money $that) {
        return $this->cents == $that->cents;
    }
}