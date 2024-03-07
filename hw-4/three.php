<?php
// строгая типизация
declare(strict_types=1);

// объявления переменных
const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_EDIT = 3;
const OPERATION_ADD_QUANTITY = 4;
const OPERATION_PRINT = 5;

$operations = [
  OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
  OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
  OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
  OPERATION_EDIT => OPERATION_EDIT . '. Изменить название товара.',
  OPERATION_ADD_QUANTITY => OPERATION_ADD_QUANTITY . '. Добавить количество товара.',
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
    echo "Введите название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
}

// функция для удаления товара из списка покупок
function performDeleteAction(array &$items): void
{
    echo 'Текущий список покупок:' . PHP_EOL;
    displayShoppingList($items);

    echo 'Введите название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    if (($key = array_search($itemName, $items, true)) !== false) {
        unset($items[$key]);
        echo 'Товар успешно удален.' . PHP_EOL;
    } else {
        echo 'Такой товар не найден в списке.' . PHP_EOL;
    }
}

// функция для изменения названия товара в списке покупок
function performEditAction(array &$items): void
{
    echo 'Текущий список покупок:' . PHP_EOL;
    displayShoppingList($items);

    echo 'Введите название товара, который вы хотите изменить: ';
    $oldItemName = trim(fgets(STDIN));

    if (in_array($oldItemName, $items, true)) {
        echo 'Введите новое название для товара: ';
        $newItemName = trim(fgets(STDIN));

        $key = array_search($oldItemName, $items, true);
        $items[$key] = $newItemName;
        echo 'Название товара успешно изменено.' . PHP_EOL;
    } else {
        echo 'Такой товар не найден в списке.' . PHP_EOL;
    }
}

// функция для добавления количества каждого товара в списке покупок
function performAddQuantityAction(array &$items): void
{
    echo 'Текущий список покупок:' . PHP_EOL;
    displayShoppingList($items);

    echo 'Введите название товара, для которого вы хотите добавить количество: ';
    $itemName = trim(fgets(STDIN));

    if (in_array($itemName, $items, true)) {
        echo 'Введите количество товара: ';
        $quantity = (int)trim(fgets(STDIN));

        $key = array_search($itemName, $items, true);
        $items[$key] .= " ({$quantity})";
        echo 'Количество товара успешно добавлено.' . PHP_EOL;
    } else {
        echo 'Такой товар не найден в списке.' . PHP_EOL;
    }
}

// функция для отображения списка покупок
function performPrintAction(array $items): void
{
    displayShoppingList($items);
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

  return $operationNumber;
}
// основной цикл программы
do {
    system('cls');
    echo "\n -----3 задание----- \n";
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
        // Вызов функции для редактирования товара из списка
        case OPERATION_EDIT:
            performEditAction($items);
            break;
        // Вызов функции для добавления количества каждого товара
        case OPERATION_ADD_QUANTITY:
            performAddQuantityAction($items);
            break;
        // Вызов функции для отображения списка покупок
        case OPERATION_PRINT:
            performPrintAction($items);
            break;
        default:
            handleUnknownOperation($operations);
            break;
    }

} while ($operationNumber !== OPERATION_EXIT);

echo 'Программа завершена' . PHP_EOL;
echo "\n ---------- \n";
?>
