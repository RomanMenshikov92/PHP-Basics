<?php

// Запросить три переменные с именем, фамилией и отчеством.
$firstName = "иван";
$lastName = "иванов";
$patronymic = "иванович";

// Объявить переменную $fullname, записать в неё полное ФИО так, чтобы каждое слово начиналось с большой буквы.
$fullName = mb_convert_case($lastName, MB_CASE_TITLE, "UTF-8") . ' ' . mb_convert_case($firstName, MB_CASE_TITLE, "UTF-8") . ' ' . mb_convert_case($patronymic, MB_CASE_TITLE, "UTF-8");

// Объявить переменную $surnameAndInitials. Её значением должна быть конкатенация фамилии с первой буквой в верхнем регистре, а также через пробел — инициалов. После каждой буквы инициалов должна быть точка.
$surnameAndInitials = mb_convert_case($lastName, MB_CASE_TITLE, "UTF-8") . ' ' . mb_strtoupper(mb_substr($firstName, 0, 1, "UTF-8")) . '. ' . mb_strtoupper(mb_substr($patronymic, 0, 1, "UTF-8")) . '.';

// Объявить переменную $fio. Значением должна быть конкатенация первых букв в верхнем регистре.
$fio = mb_strtoupper(mb_substr($lastName, 0, 1, "UTF-8")) . mb_strtoupper(mb_substr($firstName, 0, 1, "UTF-8")) . mb_strtoupper(mb_substr($patronymic, 0, 1, "UTF-8"));

// Вывести результаты
echo "Полное имя: '$fullName'" . PHP_EOL;
echo "Фамилия и инициалы: '$surnameAndInitials'" . PHP_EOL;
echo "Аббревиатура: '$fio'" . PHP_EOL;

?>