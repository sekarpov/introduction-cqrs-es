<?php

$productPrice = 10.21;
$discount = .50;

$discountedAmount = number_format($productPrice * $discount, 2);
$discountPrice = $productPrice - $discountedAmount;

echo "Round the discount instead: {$discountPrice}";

// Output:
// Round the discount instead: 5.10