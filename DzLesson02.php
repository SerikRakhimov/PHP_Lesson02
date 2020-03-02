<?php

// Заменить все знаки препирания в строке на точку.
// исходная строка
$str = "Hello, world!d,plan!z";
// знаки препинания
$marksInit = ",.:;-!?";

$marks = str_split($marksInit);
$point = ".";

// Вариант 1
$result = $str;
$chars = str_split(($result));
foreach ($chars as $key => $char) {
    foreach ($marks as $mark) {
        if ($char == $mark) {
            $result[$key] = $point;
            break;
        }
    }
}
unset($char);
unset($mark);
echo "Вариант 1 - " . $result . PHP_EOL;

// Вариант 2 (через рекурсию)
function findRepl($str, $marks, $numMark, $point): string
{
    $result = "";
    if ($numMark < count($marks)) {
        $parts = explode($marks[$numMark], $str);
        foreach ($parts as $key => $part) {
            $parts[$key] = findRepl($parts[$key], $marks, $numMark + 1, $point);
        }
        $result = implode($point, $parts);
    } else {
        $result = $str;
    }
    return $result;
}

unset($part);
echo "Вариант 2 - " . findRepl($str, $marks, 0, $point) . PHP_EOL;

// Найти наименьшее число в массиве. Если элемент массива не число, то попытаться привести к числу.
$arr = [10.01, 20, "5.01 aaa", "60", 40];
$min = null;
$work = 0;
for ($i = 0; $i < count($arr); $i++) {
    if (is_numeric($arr[$i])) {
        $work = $arr[$i];
    }
    else {
        $work = (float)$arr[$i];
    }
    if ($i == 0) {
        $min = $work;
    }
    else {
        if ($arr[$i] < $min) {
            $min = $work;
        }
    }
}
print_r($arr) . PHP_EOL;
echo "Наименьшее число  = " . $min . PHP_EOL;

// Аналогично второй задаче. Найти наибольшее число.
$max = null;
$work = 0;
for ($i = 0; $i < count($arr); $i++) {
    if (is_numeric($arr[$i])) {
        $work = $arr[$i];
    }
    else {
        $work = (float)$arr[$i];
    }
    if ($i == 0) {
        $max = $work;
    }
    else {
        if ($arr[$i] > $max) {
            $max = $work;
        }
    }
}
print_r($arr) . PHP_EOL;
echo "Наибольшее число  = " . $max . PHP_EOL;

// Найти среднее значение всех элементов массива.
$sum = 0;
$work = 0;
for ($i = 0; $i < count($arr); $i++) {
    if (is_numeric($arr[$i])) {
        $work = $arr[$i];
    }
    else {
        $work = (float)$arr[$i];
    }
    $sum += $work;
}
print_r($arr) . PHP_EOL;
echo "Среднее значение = " . $sum/count($arr) . PHP_EOL;

