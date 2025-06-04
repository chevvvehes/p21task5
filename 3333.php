<?php
declare(strict_types=1);

/**
 * Возвращает самое часто встречающееся слово в тексте.
 *
 * @param string $text Входной текст (до 1000 символов)
 * @return string Часто встречающееся слово
 */
function mostRecent(string $text): string {
    // Ограничение по длине
    if (strlen($text) > 1000) {
        return "Ошибка: текст превышает 1000 символов.";
    }

    // Приводим к нижнему регистру и убираем все, кроме букв и пробелов
    $text = strtolower($text);
    $text = preg_replace('/[^a-zа-яё0-9\s]/u', '', $text); // поддержка кириллицы и цифр

    // Разбиваем текст на слова
    $words = preg_split('/\s+/', trim($text));

    // Подсчёт слов
    $wordCounts = [];
    foreach ($words as $word) {
        if ($word === '') continue; // пропуск пустых
        if (!isset($wordCounts[$word])) {
            $wordCounts[$word] = 1;
        } else {
            $wordCounts[$word]++;
        }
    }

    // Поиск самого частого слова
    $mostFrequentWord = '';
    $maxCount = 0;

    foreach ($wordCounts as $word => $count) {
        if ($count > $maxCount) {
            $mostFrequentWord = $word;
            $maxCount = $count;
        }
    }

    return $mostFrequentWord;
}

// Пример использования
$text = "Сегодня светило солнце, солнце было ярким. Солнце";
echo "Часто встречающееся слово: " . mostRecent($text);