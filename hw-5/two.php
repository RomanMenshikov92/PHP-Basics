<?php
declare(strict_types=1);

function generateSchedule(int $year, int $month, int $numMonths): void
{
    (array)$workDays = [];
    (int)$shifts = 0;
    (int)$totalWorkHours = 0;

    for ($i = 0; $i < $numMonths; $i++) {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        // Счетчик рабочих дней, начинаем с первого дня месяца
        $workDayCounter = 1;

        echo "============2 задание========\n";
        echo date("F Y", mktime(0, 0, 0, $month, 1, $year)) . PHP_EOL;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dayOfWeek = date("N", mktime(0, 0, 0, $month, $day, $year));

            // Проверяем, является ли день рабочим
            if ($workDayCounter % 3 === 1) {
                echo "\033[32m$day\033[0m ";
                $workDays[] = $day;
                // общее количество смен
                $shifts++;
                // количество часов в одной смене (сутки = 24 часа)
                $totalWorkHours += 24;
            } else {
                if ($dayOfWeek === 6 || $dayOfWeek === 7) {
                    // Если рабочий день выпадает на субботу или воскресенье, переносим его на понедельник
                    echo "\033[32m$day\033[0m ";
                    $workDays[] = $day;
                    $shifts++;
                    $totalWorkHours += 24;
                } else {
                    // иначе - нерабочие дни
                    echo "\033[31m$day\033[0m ";
                }
            }

            if ($workDayCounter % 3 === 0) {
                $workDayCounter = 1;
            } else {
                $workDayCounter++;
            }
        }

        echo PHP_EOL;

        if ($month === 12) {
            $month = 1;
            $year++;
        } else {
            $month++;
        }
    }

    echo "=============================\n";
    echo "Рабочие дни: " . implode(", ", $workDays) . PHP_EOL;
    echo "Общее количество смен: " . $shifts . PHP_EOL;
    echo "Общее количество рабочих часов: " . $totalWorkHours . PHP_EOL;
    echo "=============================\n";
}

$startYear = (int)date('Y');
$startMonth = (int)date('m');
$numMonths = 1;

generateSchedule($startYear, $startMonth, $numMonths);
?>
