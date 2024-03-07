<?php
// строгая типизация
declare(strict_types=1);

// объявления переменных
const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];

// функция для вывода списка покупок на экран
function displayShoppingList(array $items): void
{
    if (count($items)) {
        echo 'Ваш список покупок: ' . PHP_EOL;
        echo implode("\n", $items) . "\n";
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    }
}

// функция для добавления товара в список покупок
function performAddAction(array &$items): void
{   
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;

}

// функция для удаления товара из списка покупок
function performDeleteAction(array &$items): void
{ 
    echo 'Текущий список покупок:' . PHP_EOL;
    echo 'Список покупок: ' . PHP_EOL;
    echo implode("\n", $items) . "\n";

    echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
        }
    }
}

// функция для отображения списка покупок
function performPrintAction(array $items): void
{   
    echo 'Ваш список покупок: ' . PHP_EOL;
    echo implode(PHP_EOL, $items) . PHP_EOL;
    echo 'Всего ' . count($items) . ' позиций. ' . PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}

// функция для обработки неизвестной операции
function handleUnknownOperation(array $operations): void
{
    system('cls');
    echo 'Номер операции не распознан, повторите попытку.' . PHP_EOL;
    echo 'Доступные операции:' . PHP_EOL;
    echo implode(PHP_EOL, $operations) . PHP_EOL;
}

// функция для вывода меню операций и обработки выбора пользователя
function displayMenuAndGetOperation(array $operations): int
{   
    echo 'Выберите операцию для выполнения: ' . PHP_EOL;
    echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
    $operationNumber = (int)trim(fgets(STDIN));

    if (!array_key_exists($operationNumber, $operations)) {
        system('cls');
        echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        return displayMenuAndGetOperation($operations);
    }

    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    return $operationNumber;
}

// основной цикл программы
do {
    system('cls');
    echo "\n -----2 задание----- \n";
    displayShoppingList($items);

    $operationNumber = displayMenuAndGetOperation($operations);

    switch ($operationNumber) {
        // Вызов функции для добавления товара в список
        case OPERATION_ADD:
            performAddAction($items);
            break;
        // Вызов функции для удаления товара из списка
        case OPERATION_DELETE:
            performDeleteAction($items);
            break;
        // Вызов функции для отображения списка покупок
        case OPERATION_PRINT:
            performPrintAction($items);
            break;
    }

} while ($operationNumber > 0);

echo 'Программа завершена' . PHP_EOL;
echo "\n ---------- \n";
?>
