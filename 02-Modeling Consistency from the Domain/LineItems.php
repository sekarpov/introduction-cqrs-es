<?php

class LineItems implements IteratorAggregate {
    /** @var array */
    private $lineItems;

    public function __construct(array $lineItems) {
        if (count($lineItems) == 0) {
            throw new LineItemsAreEmpty;
        }
        $this->lineItems = $lineItems;
    }

    public function getIterator() {
        return new ArrayIterator($this->lineItems);
    }
}