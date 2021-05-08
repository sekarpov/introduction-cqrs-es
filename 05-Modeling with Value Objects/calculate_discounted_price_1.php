<?php

$productPrice = 10.21;
$discount = .50;

$discountPrice = $productPrice - ($productPrice * $discount);

echo "Processing discount: {$discountPrice}";

// Output:
// Processing discount: 5.105