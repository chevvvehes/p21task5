<?php
declare(strict_types=1);

function mostRecent(string $text): string {
    if (strlen($text) > 1000) {
        return "Ошибка: текст превышает 1000 символов.";
    }
    
    $text = strtolower($text);
    $text = preg_replace('/[^a-zа-яё0-9\s]/u', '', $text); 
    $words = preg_split('/\s+/', trim($text));

    $wordCounts = [];
    foreach ($words as $word) {
        if ($word === '') continue; 
        if (!isset($wordCounts[$word])) {
            $wordCounts[$word] = 1;
        } else {
            $wordCounts[$word]++;
        }
    }

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

// Пример 
$text = "Сегодня светило солнце, солнце было ярким. Солнце";
echo "Часто встречающееся слово: " . mostRecent($text);
