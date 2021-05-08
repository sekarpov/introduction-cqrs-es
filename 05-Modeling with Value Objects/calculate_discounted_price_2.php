<?php

$productPrice = 10.21;
$discount = .50;

$discountPrice = $productPrice - ($productPrice * $discount);
$discountPrice = number_format($discountPrice, 2);

echo "Rounded after total calculation:  {$discountPrice}";

// Output:
// Processing discount: 5.11