<?php
declare(strict_types=1);

/**
 * Проверяет, является ли число совершенным.
 *
 * @param int $number Положительное целое число
 * @return bool true, если число совершенное
 */
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

/**
 * Ищет совершенные числа в массиве.
 *
 * @param array $numbers Массив положительных целых чисел
 * @return array Массив совершенных чисел
 */
function findPerfectNumbers(array $numbers): array {
    $perfectNumbers = [];

    foreach ($numbers as $num) {
        if (is_int($num) && $num > 0 && isPerfectNumber($num)) {
            $perfectNumbers[] = $num;
        }
    }

    return $perfectNumbers;
}

// Пример использования:
$input = [6, 28, 12, 496, 100, 8128];
$result = findPerfectNumbers($input);

echo "Совершенные числа: " . implode(', ', $result);