<?php

class MoneyV5 {
    /** @var int */
    private $cents = 0;
    /** @var Currency */
    private $currency;

    private function __construct($cents, Currency $currency) {
        $this->cents = $cents;
        $this->currency = $currency;
    }

    public static function fromString($amount, Currency $currency) {
        return new MoneyV5($amount * 100, $currency);
    }

    public static function fromCents($cents, Currency $currency) {
        return new MoneyV5($cents, $currency);
    }

    public function add(MoneyV5 $that) {
        if ( ! $this->currency->equals($that->currency)) {
            throw new CurrenciesDontMatch($this->currency, $that->currency);
        }
        return new MoneyV5($this->cents + $that->cents, $this->currency);
    }

    public function reducedByPercent($percent) {
        $reduction = $this->cents * ($percent / 100);
        $difference = $this->cents - $reduction;
        $rounded = round($difference, 0);
        return MoneyV5::fromCents($rounded, $this->currency);
    }
}