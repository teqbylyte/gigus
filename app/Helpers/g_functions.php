<?php

/**
 * Convert to human-readable format with country's currency
 *
 * @param float $value
 * @param string $symbol
 * @return string
 */
function moneyFormat(float $value, string $symbol = '₦'): string
{
    if ($value < 0) {
        $print_number = "($symbol" . str_replace('-', '', number_format ($value, 2, ".", ",")) . ")";
    } else {
        $print_number = "$symbol" .  number_format ((int) $value, 2, ".", ",") ;
    }

    return $print_number;
}
