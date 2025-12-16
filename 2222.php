<?php
declare(strict_types=1);

function isPerfectNumber(int $number): bool {
    if ($number <= 1) {
        return false;
    }

    $sum = 0;
    for ($i = 1; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            $sum += $i;
        }
    }

    return $sum === $number;
}

function findPerfectNumbers(array $numbers): array {
    $perfectNumbers = [];

    foreach ($numbers as $num) {
        if (is_int($num) && $num > 0 && isPerfectNumber($num)) {
            $perfectNumbers[] = $num;
        }
    }

    return $perfectNumbers;
}

// Пример:
$input = [6, 28, 12, 496, 100, 8128];
$result = findPerfectNumbers($input);

echo "Совершенные числа: " . implode(', ', $result);
