<?php
declare(strict_types=1);

/**
 * Сортирует буквы строки в алфавитном порядке.
 *
 * @param string $str Входная строка
 * @return string Отсортированная строка
 */
function alphabeticalOrder(string $str): string {
    // Преобразуем строку в массив символов
    $chars = str_split($str);

    // Сортируем массив по алфавиту
    sort($chars);

    // Объединяем обратно в строку
    return implode('', $chars);
}

// Пример использования
$input = 'alphabetical';
$result = alphabeticalOrder($input);
echo "Результат: " . $result; // Ожидается: aaabcehillpt
