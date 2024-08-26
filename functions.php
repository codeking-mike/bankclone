<?php
function replaceWithAsterisks($str) {
    if (strlen($str) < 6) {
        return $str; // Return the original string if it's less than 6 characters
    } else {
        return str_repeat('*', 6) . substr($str, 6); // Replacing the first 6 characters with asterisks
    }
}

//currency format

function formatCurrency($amount, $currency = 'USD') {
    // Format the amount as currency
    switch ($currency) {
        case 'USD':
            $formatted = '$' . number_format($amount, 2);
            break;
        case 'EUR':
            $formatted = '€' . number_format($amount, 2);
            break;
        // Add more cases for other currencies if needed
        default:
            $formatted = number_format($amount, 2) . ' ' . $currency;
            break;
    }
    return $formatted;
}

?>