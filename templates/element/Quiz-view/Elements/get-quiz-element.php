<?php

$quizType = isset($quizType) ? $quizType : 0;

$elementMap = [
    1 => 'Quiz-view/choose-one-option',
    2 => 'Quiz-view/choose-one-image',
    3 => 'Quiz-view/order-the-words',
    4 => 'Quiz-view/match',
    5 => 'Quiz-view/carusel',
    6 => 'Quiz-view/listen-order',
    7 => 'Quiz-view/read-repeat',
    8 => 'Quiz-view/conversation-speaking',
];

if (array_key_exists($quizType, $elementMap)) {
    echo $this->element($elementMap[$quizType], [
        'question' => $currentShort['quiz']['questions'][0]['question'],
        'questions' => $currentShort['quiz']['questions'],
        'options' => $currentShort['quiz']['options'],
        'currentShortData' => $currentShortData
    ]);
}